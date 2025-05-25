<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function index(){
        $banners = Banner::where('status', '1')->get();
        $products = Product::orderBy('created_at', 'desc')->where('trang_thai', '1')->limit(8)->get();
        $posts = Post::orderBy('created_at', 'desc')->where('status', '1')->limit(4)->get();
        $topReviews = Review::with(['customer', 'product'])
            ->where('status', '1')
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get();
            // dd($topReviews);
            // foreach ($topReviews as $review) {
            //     dd($review->product);
            // }
        return view('clients.home', compact('banners', 'products', 'posts', 'topReviews'));
    }

   
}
