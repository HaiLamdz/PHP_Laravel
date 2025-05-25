<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // dd('h a i l a m d e p z a i');
        // dd($request->all());
        $query = Product::with('category');
        $categories = Category::get();
        // tìm kiếm theo mã sản phẩm
        // Tìm kiếm theo mã sản phẩm
        if ($request->filled('ma_san_pham')) {
            $query->where('ma_san_pham', 'LIKE', '%' . $request->ma_san_pham . '%');
        }

        // Tìm kiếm theo tên sản phẩm
        if ($request->filled('ten_san_pham')) {
            $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
        }

        // // Tìm kiếm theo khoảng giá
        if ($request->filled('gia_min') && $request->filled('gia_max')) {
            $query->whereBetween('gia_san_pham', [$request->gia_min, $request->gia_max]);
        } elseif ($request->filled('gia_min')) {
            $query->where('gia_san_pham', '>=', $request->gia_min);
        } elseif ($request->filled('gia_max')) {
            $query->where('gia_san_pham', '<=', $request->gia_max);
        }

        // // Tìm kiếm theo ngày nhập
        if ($request->filled('ngay_nhap')) {
            $query->whereDate('ngay_nhap', $request->ngay_nhap);
        }

        // // Tìm kiếm theo trạng thái
        if ($request->has('trang_thai') && $request->filled('trang_thai') != '') {
            $query->where('trang_thai', $request->trang_thai);
        }

        // // Tìm kiếm theo danh mục
        if ($request->has('category_id') && $request->filled('category_id') != '') {
            $query->where('category_id', $request->category_id);
        }
        $query->orderBy('id', 'desc');
        $products = $query->paginate(10);
        // dd($products);
        // dd($query->toSql(), $query->getBindings());
        return view('admin.products.product', compact('products', 'categories'));

        // tìm kiếm theo tên, danh muc, khoảng giá, ngày nhập, trạng thái
        // tạo master layout trang quản trị,, tạo giao diện trang quản ly sản phẩm, hiển thị danh sách sản phẩm(có phần trang)
    }

    public function show($id)
    {
        // echo "đây là trang chi tiết sản phẩm";
        // dd($id);
        $product = Product::with('category')->orderBy('id', 'desc')->findOrFail($id);
        // dd($product);
        return view('admin.products.show', compact('product'));

        // hiển thị thông tin chi tiết sản phẩm ra giao diện????
        // Xây dựng giao diện trang thêm, sửa
    }

    public function create()
    {
        $categories = Category::get();
        // dd($categories);
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $dataNew = [
        //     'ma_san_pham' => $request->ma_san_pham,
        //     'ten_san_pham' => $request->ten_san_pham,
        //     'category_id' => $request->category,
        //     'gia_san_pham' => $request->gia_san_pham,
        //     'gia_khuyen_mai' => $request->gia_khuyen_mai,
        //     'so_luong' => $request->so_luong,
        //     'ngay_nhap' => $request->ngay_nhap,
        //     'mo_ta' => $request->mo_ta,
        //     'trang_thai' => $request->trang_thai,
        // ];

        $dataNew = $request->validate([
            'ma_san_pham' => 'required|string|max:20|unique:products,ma_san_pham',
            'ten_san_pham' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'hinh_anh' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
            'gia_san_pham' => 'required|numeric|min:1',
            'gia_khuyen_mai' => 'nullable|numeric|min:1|lt:gia_san_pham',
            'so_luong' => 'required|integer|min:1',
            'ngay_nhap' => 'required|date',
            'trang_thai' => 'required'
        ], [
            'required' => ':attribute không được để trống.',
            'string' => ':attribute phải là chuỗi.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'min' => ':attribute không được nhỏ hơn :min.',
            'numeric' => ':attribute phải là số.',
            'integer' => ':attribute phải là số nguyên.',
            'date' => ':attribute phải là ngày hợp lệ.',
            'image' => ':attribute phải là hình ảnh.',
            'mimes' => ':attribute phải có định dạng: :values.',
            'unique' => ':attribute đã tồn tại.',
            'exists' => ':attribute không hợp lệ.',
            'lt' => ':attribute phải nhỏ hơn :other.',
        ],[
            'ma_san_pham' => 'Mã sản phẩm',
            'ten_san_pham' => 'Tên sản phẩm',
            'category_id' => 'Danh mục',
            'hinh_anh' => 'Hình ảnh',
            'gia_san_pham' => 'Giá sản phẩm',
            'gia_khuyen_mai' => 'Giá khuyến mãi',
            'so_luong' => 'Số lượng',
            'ngay_nhap' => 'Ngày nhập',
            'trang_thai' => 'Trạng thái'
        ]);
        // dd($dataNew);
        // xử lý hình ảnh
        if ($request->hasFile('hinh_anh')) {
            $imgPath = $request->file('hinh_anh')->store('image/products', 'public');
            $dataNew['hinh_anh'] = $imgPath;
        }

        Product::create($dataNew);

        return redirect()->route('admin.product.list');


        // return redirect()->back();   
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        // dd($product);
        return view('admin.products.update', compact('product', 'categories'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $dataNew = $request->validate([
            'ma_san_pham' => 'required|string|max:20|unique:products,ma_san_pham,' . $id,
            'ten_san_pham' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'hinh_anh' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'gia_san_pham' => 'required|numeric|min:1',
            'gia_khuyen_mai' => 'nullable|numeric|min:1|lt:gia_san_pham',
            'so_luong' => 'required|integer|min:1',
            'ngay_nhap' => 'required|date',
            'trang_thai' => 'required'
        ], [
            'required' => ':attribute không được để trống.',
            'string' => ':attribute phải là chuỗi.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'min' => ':attribute không được nhỏ hơn :min.',
            'numeric' => ':attribute phải là số.',
            'integer' => ':attribute phải là số nguyên.',
            'date' => ':attribute phải là ngày hợp lệ.',
            'image' => ':attribute phải là hình ảnh.',
            'mimes' => ':attribute phải có định dạng: :values.',
            'unique' => ':attribute đã tồn tại.',
            'exists' => ':attribute không hợp lệ.',
            'lt' => ':attribute phải nhỏ hơn :other.',
        ],[
            'ma_san_pham' => 'Mã sản phẩm',
            'ten_san_pham' => 'Tên sản phẩm',
            'category_id' => 'Danh mục',
            'hinh_anh' => 'Hình ảnh',
            'gia_san_pham' => 'Giá sản phẩm',
            'gia_khuyen_mai' => 'Giá khuyến mãi',
            'so_luong' => 'Số lượng',
            'ngay_nhap' => 'Ngày nhập',
            'trang_thai' => 'Trạng thái'
        ]);
        // dd($dataNew);
        $product = Product::findOrFail($id);
        // dd($product->hinh_anh);
        // $dataNew['hinh_anh'] = $product->hinh_anh;
        if ($request->hasFile('hinh_anh')) {
            $imgPath = $request->file('hinh_anh')->store('image/products', 'public');
            $dataNew['hinh_anh'] = $imgPath;

            if($product->hinh_anh){
                Storage::disk('public')->delete($product->hinh_anh);
            }
        }
        $product->update($dataNew);

        return redirect()->route('admin.product.list');
    }

    public function destroy($id){
        // $product = Product::findOrFail($id);
        // if($product->hinh_anh){
        //     Storage::disk('public')->delete($product->hinh_anh);
        // }

        // $product->delete();
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.product.list')->with('success', 'xóa sp thành công');
    }

    public function trash(Request $request){
        $query = Product::with('category')->onlyTrashed();

        if ($request->filled('ma_san_pham')) {
            $query->where('ma_san_pham', 'LIKE', '%' . $request->ma_san_pham . '%');
        }

        // Tìm kiếm theo tên sản phẩm
        if ($request->filled('ten_san_pham')) {
            $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
        }

        // // Tìm kiếm theo khoảng giá
        if ($request->filled('gia_min') && $request->filled('gia_max')) {
            $query->whereBetween('gia_san_pham', [$request->gia_min, $request->gia_max]);
        } elseif ($request->filled('gia_min')) {
            $query->where('gia_san_pham', '>=', $request->gia_min);
        } elseif ($request->filled('gia_max')) {
            $query->where('gia_san_pham', '<=', $request->gia_max);
        }

        // // Tìm kiếm theo ngày nhập
        if ($request->filled('ngay_nhap')) {
            $query->whereDate('ngay_nhap', $request->ngay_nhap);
        }

        // // Tìm kiếm theo trạng thái
        if ($request->has('trang_thai') && $request->filled('trang_thai') != '') {
            $query->where('trang_thai', $request->trang_thai);
        }

        // // Tìm kiếm theo danh mục
        if ($request->has('category_id') && $request->filled('category_id') != '') {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(10);
        $categories = Category::get();
        // dd($products);
        return view('admin.products.trash', compact('products', 'categories'));
    }

    public function restore($id){
        Product::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Khôi phục sản phẩm thành công');
    }

    public function forceDelete($id){
        Product::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm vĩnh viễn');
    }
}
