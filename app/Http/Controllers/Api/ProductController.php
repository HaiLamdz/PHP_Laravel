<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Product::with('category');
        $categories = Category::all();

        // tìm kiếm sản phẩm 
        if ($request->has('keyword') && !empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('ma_san_pham', 'like', '%' . $request->keyword . '%')
                    ->orWhere('ten_san_pham', 'like', '%' . $request->keyword . '%');
            });
        }
        // if($request->filled('ma_san_pham')){
        //     $query->where('ma_san_pham', 'LIKE', '%' . $request->ma_san_pham . '%');
        // }
        // if ($request->filled('ten_san_pham')) {
        //     $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
        // }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        // Tìm kiếm theo khoảng giá
        if ($request->filled('gia_min')) {
            $query->where('gia', '>=', $request->gia_min);
        }
        if ($request->filled('gia_max')) {
            $query->where('gia', '<=', $request->gia_max);
        }

        // Tìm kiếm theo ngày nhập
        if ($request->filled('ngay_nhap')) {
            $query->whereDate('ngay_nhap', '>=', $request->ngay_nhap);
        }
        // Tìm kiếm theo trạng thái (1: Đang bán, 0: Ngừng bán)
        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }

        // Thực hiện tìm kiếm theo 
        // tên sản phẩm, danh mục, khoảng giá, ngày nhập, trạng thái
        $query->orderBy('id', 'desc');  // sắp xếp


        $products = $query->paginate(20);

        // return view('admin.products.index', compact('products', 'categories'));
        return  response()->json($products);
        // return ProductResource::collection($products);
        // collection  
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $products = Product::create($dataNew);

        return response()->json([
            'message' => 'Thêm Sản Phẩm Thành Công',
            'data' => new ProductResource($products),
            'status' => 201,
            'author' => 'VuHaiLamPH45233'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $products = Product::with('category')->findOrFail($id);
        // return  response()->json($products);
        
        return  response()->json([
            'message' => 'lay thong tin chi tiet thanh cong',
            'data' => new ProductResource($products),
            'status' => 200,
            'author' => 'HaiLam',
        ]);
        // return new ProductResource($products);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        return  response()->json([
            'message' => 'sua san pham thanh cong',
            'data' => new ProductResource($product),
            'status' => 200,
            'author' => 'HaiLam',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $product = Product::findOrFail($id);
        if($product->hinh_anh){
            Storage::disk('public')->delete($product->hinh_anh);
        }

        $product->delete();
        // Product::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Xoa san pham thanh cong',
            'status' => 200
        ]);
    }
}
