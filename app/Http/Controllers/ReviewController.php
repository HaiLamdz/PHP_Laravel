<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Review::with('customer', 'product');
        $customers = Customer::whereHas('review')->get();
        $products = Product::whereHas('review')->get();

        $query->orderBy('id', 'desc');
        if ($request->has('customer_id') && $request->filled('customer_id') != '') {
            $query->where('customer_id', $request->customer_id);
        }
        if ($request->has('product_id') && $request->filled('product_id') != '') {
            $query->where('product_id', $request->product_id);
        }
        if ($request->has('rating') && $request->filled('rating') != '') {
            $query->where('rating', $request->rating);
        }
        if ($request->has('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }
        $reviews = $query->paginate(10);
        // dd($customers);
        return view('admin.reviews.list', compact('reviews', 'customers', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::get();
        $products = Product::get();

        return view('admin.reviews.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataNew = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required',
            'description' => 'nullable',
            'status' => 'required'
        ], [
            'required' => ':attribute không được để trống.',
            'exists' => ':attribute không hợp lệ.',
            'integer' => ':attribute phải là số nguyên.',
            'min' => ':attribute không được nhỏ hơn :min.',
            'max' => ':attribute không được lớn hơn :max.',
            'in' => ':attribute phải là một trong các giá trị: :values.'
        ], [
            'customer_id' => 'Khách hàng',
            'product_id' => 'Sản phẩm',
            'rating' => 'Đánh giá',
            'description' => 'Mô tả',
            'status' => 'Trạng thái'
        ]);

        Review::create($dataNew);
        return redirect()->route('admin.review.list')->with('success', 'Thêm Đánh Giá Thành Công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::get();
        $products = Product::get();
        $review = Review::findOrFail($id);

        return view('admin.reviews.update', compact('customers', 'products', 'review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataNew = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        Review::findOrFail($id)->update($dataNew);
        return redirect()->route('admin.review.list')->with('success', 'Sửa Đánh Giá Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->route('admin.review.list')->with('success', 'Xóa Đánh Giá Thành Công');
    }

    public function trash(Request $request)
    {
        $query = Review::orderBy('deleted_at', 'desc')->onlyTrashed();
        // Lấy danh sách khách hàng có đánh giá đã bị xóa mềm
        $customers = Customer::whereHas('review', function ($query) {
            $query->onlyTrashed(); // Chỉ lấy khách hàng có review đã bị xóa mềm
        })->get();

        // Lấy danh sách sản phẩm có đánh giá đã bị xóa mềm
        $products = Product::whereHas('review', function ($query) {
            $query->onlyTrashed(); // Chỉ lấy sản phẩm có review đã bị xóa mềm
        })->get();
        if ($request->has('customer_id') && $request->filled('customer_id') != '') {
            $query->where('customer_id', $request->customer_id);
        }
        if ($request->has('product_id') && $request->filled('product_id') != '') {
            $query->where('product_id', $request->product_id);
        }
        if ($request->has('rating') && $request->filled('rating') != '') {
            $query->where('rating', $request->rating);
        }
        if ($request->has('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }
        $reviews = $query->paginate(10);
        // dd($reviews);
        return view('admin.reviews.trash', compact('reviews', 'customers', 'products'));
    }

    public function restore($id)
    {
        Review::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Khôi phục đánh giá thành công');
    }

    public function forceDelete($id)
    {
        Review::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Đã xóa đánh giá vĩnh viễn');
    }
}
