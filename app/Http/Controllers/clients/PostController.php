<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return view('clients.post', compact('posts'));
    }
}
