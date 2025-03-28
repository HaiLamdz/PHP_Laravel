@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa Tài Khoản</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">General Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa Tài Khoản</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.customer.update', $customer->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Và Tên</label>
                                <input type="text" name="name" @error('name') is-invalid @enderror
                                    value="{{old('name', $customer->name)}}" class="form-control">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ old('email', $customer->email)}}" >
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tuổi</label>
                                <input type="text" name="age" value="{{old('age', $customer->age)}}"
                                    class="form-control" >
                                @error('age')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu</label>
                                <input type="password" name="password" value="{{old('password' , $customer->name)}}"
                                    class="form-control" >
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giới Tính</label>
                                <select class="form-control" name="gender" id="">
                                    <option value=" ">Lựa chọn giới tính</option>
                                    <option value="Nam" @selected(old('gender', $customer->gender) === 'Nam')>Nam</option>
                                    <option  value="Nữ" @selected(old('gender', $customer->gender) === 'Nữ')>Nữ</option>
                                </select>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select class="form-control" name="status" id="">
                                    <option >Lựa chọn trạng thái</option>
                                    <option value="1" @selected(old('status', $customer->status) == 1)>Hoạt Động</option>
                                    <option value="0" @selected(old('status', $customer->status) == 0)>Không Hoạt Động</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection