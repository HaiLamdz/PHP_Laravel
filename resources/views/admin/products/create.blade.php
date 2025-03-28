@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm Sản Phẩm</h1>
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
@foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
@endforeach
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm Sản Phẩm</h3>
                    </div>
                    
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                                <input type="text" name="ma_san_pham" class="form-control"
                                    placeholder="Enter Name Product">
                                    @error('ma_san_pham')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" name="ten_san_pham" class="form-control"
                                    placeholder="Enter Name Product">
                                    @error('ten_san_pham')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh Mục</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->ten_danh_muc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá Sản Phẩm</label>
                                <input type="text" name="gia_san_pham" class="form-control" placeholder="Enter Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá Khuyễn Mãi</label>
                                <input type="text" name="gia_khuyen_mai" class="form-control"
                                    placeholder="Enter Promotion Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số Lượng</label>
                                <input type="number" name="so_luong" class="form-control"
                                    placeholder="Enter Promotion Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ngày Nhập</label>
                                <input type="date" name="ngay_nhap" class="form-control"
                                    placeholder="Enter Promotion Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="hinh_anh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea class="form-control" id="noi_dung" rows="10" cols="50" name="mo_ta"
                                    rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select class="form-control" name="trang_thai" id="">
                                    <option value="1">Còn Hàng</option>
                                    <option value="0">Hết Hàng</option>
                                </select>
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