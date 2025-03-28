<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::orderBy('id', 'desc');

        // Tìm kiếm theo tên
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        // Tìm kiếm theo email
        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }
        // Tìm kiếm theo sdt
        if ($request->filled('phone')) {
            $query->where('phone', 'LIKE', '%' . $request->phone . '%');
        }

        // // Tìm kiếm theo trạng thái
        if ($request->filled('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }

        $contacts = $query->paginate(10);

        return view('admin.contacts.list', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataNew = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'phone' => 'required|min:10|max:20',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        Contact::create($dataNew);
        return redirect()->route('admin.contacts.list')->with('success', 'Thêm Liên Hệ Thành Công');
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
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.update', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataNew = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'phone' => 'required|min:10|max:20',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        Contact::findOrFail($id)->update($dataNew);
        return redirect()->route('admin.contacts.list')->with('success', 'Sửa Liên Hệ Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.contact.list')->with('success', 'Xóa Liên Hệ Thành Công');
    }

    public function trash(Request $request)
    {
        $query = Contact::orderBy('deleted_at', 'desc')->onlyTrashed();

        // Tìm kiếm theo tên
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        // Tìm kiếm theo email
        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }
        // Tìm kiếm theo sdt
        if ($request->filled('phone')) {
            $query->where('phone', 'LIKE', '%' . $request->phone . '%');
        }

        // // Tìm kiếm theo trạng thái
        if ($request->filled('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }

        $contacts = $query->paginate(10);
        // dd($contacts);
        return view('admin.contacts.trash', compact('contacts'));
    }

    public function restore($id)
    {
        Contact::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Khôi phục liên hệ thành công');
    }

    public function forceDelete($id)
    {
        Contact::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Đã xóa liên hệ vĩnh viễn');
    }
}
