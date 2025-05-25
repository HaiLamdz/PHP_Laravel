@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm Bài Viết</h1>
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
                        <h3 class="card-title">Thêm Bài Viết</h3>
                    </div>
                    
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.review.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tài Khoản</label>
                                <select class="form-control" name="customer_id" id="">
                                    <option value="">Lựa Chọn Tài Khoản</option>
                                    @foreach ($customers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sản Phẩm</label>
                                <select class="form-control" name="product_id" id="">
                                    <option value="">Lựa Chọn Sản Phẩm</option>
                                    @foreach ($products as $item)
                                    <option value="{{$item->id}}">{{$item->ten_san_pham}}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số Sao</label>
                                <select class="form-control" name="rating" id="">
                                    <option value="">Lựa chọn Sao</option>
                                    <option value="1">1 sao</option>
                                    <option value="2">2 sao</option>
                                    <option value="3">3 sao</option>
                                    <option value="4">4 sao</option>
                                    <option value="5">5 sao</option>
                                </select>
                                @error('rating')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea class="form-control" id="noi_dung" rows="10" cols="50" name="description"
                                    rows="3">{{old('description')}}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select class="form-control" name="status" id="">
                                    <option value="">Lựa chọn trạng thái</option>
                                    <option @selected(old('status') == '1') value="1">Hiện</option>
                                    <option @selected(old('status') == '0') value="0">Ẩn</option>
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