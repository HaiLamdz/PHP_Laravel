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
{{-- @foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
@endforeach --}}
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
                                    placeholder="Enter Name Product" value="{{old('ma_san_pham')}}">
                                    @error('ma_san_pham')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" name="ten_san_pham" class="form-control"
                                    placeholder="Enter Name Product" value="{{old('ten_san_pham')}}">
                                    @error('ten_san_pham')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh Mục</label>
                                <select class="form-control" name="category_id" id="">
                                    <option value="">Lựa chọn danh mục...</option>
                                    @foreach ($categories as $item)
                                    <option @selected(old('category_id', $item->id) ==  $item->id) value="{{$item->id}}">{{$item->ten_danh_muc}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá Sản Phẩm</label>
                                <input type="text" name="gia_san_pham" value="{{old('gia_san_pham')}}" class="form-control" placeholder="Enter Price">
                                @error('gia_san_pham')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá Khuyễn Mãi</label>
                                <input type="text" name="gia_khuyen_mai" class="form-control"
                                    placeholder="Enter Promotion Price" value="{{old('gia_khuyen_mai')}}">
                                    @error('gia_khuyen_mai')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số Lượng</label>
                                <input type="number" name="so_luong" class="form-control"
                                    placeholder="Enter Promotion Price" value="{{old('so_luong')}}">
                                    @error('so_luong')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ngày Nhập</label>
                                <input type="date" name="ngay_nhap" class="form-control"
                                    placeholder="Enter Promotion Price" value="{{old('ngay_nhap')}}">
                                    @error('ngay_nhap')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="hinh_anh" value="{{old('hinh_anh')}}" class="form-control">
                                @error('hinh_anh')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea class="form-control" id="noi_dung" rows="10" cols="50" name="mo_ta"
                                    rows="3">{{old('mo_ta')}}</textarea>
                                    @error('mo_ta')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select class="form-control" name="trang_thai" id="">
                                    <option value="">Lựa Chọn Trạng Thái..</option>
                                    <option {{old('trang_thai') == 1 ? 'selected' : ''}} value="1">Còn Hàng</option>
                                    <option {{old('trang_thai') == 0 ? 'selected' : ''}} value="0">Hết Hàng</option>
                                </select>
                                @error('trang_thai')
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