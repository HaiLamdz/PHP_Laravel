<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $query = Customer::orderBy('id', 'desc');

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->filled('age')) {
            $query->where('age', 'LIKE', '%' . $request->age . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if ($request->filled('gender') && $request->filled('gender') != '') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }

        $customers = $query->paginate(10);
        // dd($query->toSql(), $query->getBindings());
        return view('admin.customers.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $dataNew = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|max:50|unique:customers,email',
            'age' => 'required|integer',
            'password' => 'required|',
            'gender' => 'required|in:Nam,Nữ',
            'status' => 'required|in:1,0'
        ]);

        Customer::create($dataNew);
        return redirect()->route('admin.customer.list')->with('success', 'Thêm người dùng thành công');
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
        $customer = Customer::findOrFail($id);
        return view('admin.customers.update', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataNew = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|max:50|unique:customers,email,' . $id,
            'age' => 'required|integer',
            'password' => 'required|',
            'gender' => 'required|',
            'status' => 'required'
        ]);

        Customer::findOrFail($id)->update($dataNew);
        return redirect()->route('admin.customer.list')->with('success', 'Sửa Tài Khoản Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::findOrFail($id)->delete();
        return redirect()->route('admin.customer.list')->with('success', 'Xóa Tài Khoản Thành Công');
    }

    public function trash(Request $request)
    {
        $query = Customer::orderBy('deleted_at', 'desc')->onlyTrashed();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->filled('age')) {
            $query->where('age', 'LIKE', '%' . $request->age . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if ($request->filled('gender') && $request->filled('gender') != '') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('status') && $request->filled('status') != '') {
            $query->where('status', $request->status);
        }
        $customers = $query->paginate(10);
        // dd($customers);
        return view('admin.customers.trash', compact('customers'));
    }

    public function restore($id)
    {
        Customer::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Khôi phục tài khoản thành công');
    }

    public function forceDelete($id)
    {
        Customer::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Đã xóa tài khoản vĩnh viễn');
    }
}
