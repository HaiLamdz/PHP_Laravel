<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $query = Banner::orderBy('id', 'desc');
        // Tìm kiếm theo tiêu đề
        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        // // Tìm kiếm theo trạng thái
        if ($request->filled('status') && $request->filled('status') != '') {
            $query->where('status', $request->status );
        }
        $banners = $query->paginate(10);
        // dd($banners);
        // dd($query->toSql(), $query->getBindings());
        return view('admin.banners.list', compact('banners'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataNew = $request->validate([
            'title' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'status' => 'required'
        ]);
        // dd($dataNew);
        // xử lý hình ảnh
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('image/banners', 'public');
            $dataNew['image'] = $imgPath;
        }

        Banner::create($dataNew);

        return redirect()->route('admin.banner.list')->with('success', 'thêm banner thành công');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        // dd($banner);
        return view('admin.banners.update', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataNew = $request->validate([
            'title' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'status' => 'required'
        ]);
        // dd($dataNew);
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('image/banners', 'public');
            $dataNew['image'] = $imgPath;

            if($banner->image){
                Storage::disk('public')->delete($banner->image);
            }
        }
        $banner->update($dataNew);

        return redirect()->route('admin.banner.list')->with('success', 'sửa banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $banner = Banner::findOrFail($id);
        // if($banner->image){
        //     Storage::disk('public')->delete($banner->image);
        // }

        // $banner->delete();
        Banner::findOrFail($id)->delete();
        return redirect()->route('admin.banner.list')->with('success', 'xóa banner thành công');
    }

    public function trash(Request $request){
        $query = Banner::orderBy('deleted_at', 'desc')->onlyTrashed();

        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        // // Tìm kiếm theo trạng thái
        if ($request->filled('status') && $request->filled('status') != '') {
            $query->where('status', $request->status );
        }

        $banners = $query->paginate(10);
        // dd($banners);
        return view('admin.banners.trash', compact('banners'));
    }

    public function restore($id){
        Banner::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Khôi phục banner thành công');
    }

    public function forceDelete($id){
        Banner::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Đã xóa banner vĩnh viễn');
    }
}
