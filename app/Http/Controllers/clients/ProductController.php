<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function products(Request $request)
{
    $query = Product::where('trang_thai', '1');

    // Search by name
    if ($request->filled('ten_san_pham')) {
        $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
    }

    // Filter by category
    if ($request->filled('category_id') && is_numeric($request->category_id)) {
        $query->where('category_id', (int)$request->category_id);
    }

    // Filter by price range
    if ($request->filled('min_price') && is_numeric($request->min_price)) {
        $query->where('gia_san_pham', '>=', (float)$request->min_price);
    }

    if ($request->filled('max_price') && is_numeric($request->max_price)) {
        $query->where('gia_san_pham', '<=', (float)$request->max_price);
    }

    // Sort by price
    if ($request->filled('sort')) {
        if ($request->sort == 'price_asc') {
            $query->orderBy('gia_san_pham', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('gia_san_pham', 'desc');
        }
    } else {
        $query->orderBy('created_at', 'desc');
    }

    $products = $query->paginate(10);
    $categories = Category::all();

    return view('clients.products', compact('products', 'categories'));
}


    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        $product_cate = Product::where('category_id', $product->category_id)->limit(5)->get();
        $review = Review::with(['customer'])->where('product_id', $id)->get();
        // dd($review);
        return view('clients.product_detail', compact('product', 'review', 'product_cate'));
    }

    public function postReview(Request $req){
        $customer_id = Auth::user()->id;
        // dd($customer_id);
        $req->validate([
            'rating' => 'required',
            'description' => 'nullable',
            'product_id' => 'nullable'
        ]);
        // dd($data);
        Review::create([
            'customer_id' => $customer_id,
            'product_id' => $req->product_id,
            'rating' => $req->rating,
            'description' => $req->description,
        ]);

        return redirect()->route('product_detail', $req->product_id)->with('success', 'Đánh Giá Thành Công Sản Phẩm');
    }
}
