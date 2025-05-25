<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::orderBy('id', 'desc');


        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        // // Tìm kiếm theo khoảng view
        if ($request->filled('view_min') && $request->filled('view_max')) {
            $query->whereBetween('view', [$request->view_min, $request->view_max]);
        } elseif ($request->filled('view_min')) {
            $query->where('view', '>=', $request->view_min);
        } elseif ($request->filled('view_max')) {
            $query->where('view', '<=', $request->view_max);
        }
        // // Tìm kiếm theo trạng thái
        if ($request->has('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }
        $posts = $query->paginate(10);
        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataNew = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'description' => 'nullable',
            'status' => 'required'
        ], [
            'required' => ':attribute không được để trống.',
            'string' => ':attribute phải là chuỗi.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'image' => ':attribute phải là một tệp hình ảnh.',
            'mimes' => ':attribute phải có định dạng: :values.',
            'in' => ':attribute phải là một trong các giá trị: :values.'
        ], [
            'title' => 'Tiêu đề',
            'image' => 'Hình ảnh',
            'description' => 'Mô tả',
            'status' => 'Trạng thái'
        ]);

        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('image/posts', 'public');
            $dataNew['image'] = $imgPath;
        }
        
        Post::create($dataNew);
        return redirect()->route('admin.post.list')->with('success', 'Thêm Bài Viết Thành Công');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataNew = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'description' => 'nullable',
            'status' => 'required'
        ], [
            'required' => ':attribute không được để trống.',
            'string' => ':attribute phải là chuỗi.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'image' => ':attribute phải là một tệp hình ảnh.',
            'mimes' => ':attribute phải có định dạng: :values.',
            'in' => ':attribute phải là một trong các giá trị: :values.'
        ], [
            'title' => 'Tiêu đề',
            'image' => 'Hình ảnh',
            'description' => 'Mô tả',
            'status' => 'Trạng thái'
        ]);
        $post = Post::findOrFail($id);
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('image/posts', 'public');
            $dataNew['image'] = $imgPath;

            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
        }
        
        $post->update($dataNew);
        return redirect()->route('admin.post.list')->with('success', 'Sửa Bài Viết Thành Công');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $post = Post::findOrFail($id);
        // if($post->image){
        //     Storage::disk('public')->delete($post->image);
        // }

        // $post->delete();
        Post::findOrFail($id)->delete();
        return redirect()->route('admin.post.list')->with('success', 'xóa bài viết thành công');
    }

    public function trash(Request $request)
    {
        $query = Post::orderBy('deleted_at', 'desc')->onlyTrashed();

        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        // // Tìm kiếm theo khoảng view
        if ($request->filled('view_min') && $request->filled('view_max')) {
            $query->whereBetween('view', [$request->view_min, $request->view_max]);
        } elseif ($request->filled('view_min')) {
            $query->where('view', '>=', $request->view_min);
        } elseif ($request->filled('view_max')) {
            $query->where('view', '<=', $request->view_max);
        }
        // // Tìm kiếm theo trạng thái
        if ($request->has('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }
        $posts = $query->paginate(10);
        // dd($posts);
        return view('admin.posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Khôi phục bài viết thành công');
    }

    public function forceDelete($id)
    {
        Post::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Đã xóa bài viết vĩnh viễn');
    }
}
