@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa Bài Viết</h1>
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
                        <h3 class="card-title">Sửa Bài Viết</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.review.update', $review->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tài Khoản</label>
                                <select class="form-control" name="customer_id" id="">
                                    <option >Lựa Chọn Tài Khoản</option>
                                    @foreach ($customers as $item)
                                    <option value="{{$item->id}}" @selected(old('customer_id', $review->customer_id) == $item->id) >{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sản Phẩm</label>
                                <select class="form-control" name="product_id" id="">
                                    <option>Lựa Chọn Sản Phẩm</option>
                                    @foreach ($products as $item)
                                    <option value="{{$item->id}}" @selected(old('product_id', $review->product_id) == $item->id)>{{$item->ten_san_pham}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số Sao</label>
                                <select class="form-control" name="rating" id="">
                                    <option >Lựa chọn Sao</option>
                                    <option value="1" @selected(old('rating', $review->rating) == 1)>1 sao</option>
                                    <option value="2" @selected(old('rating', $review->rating) == 2)>2 sao</option>
                                    <option value="3" @selected(old('rating', $review->rating) == 3)>3 sao</option>
                                    <option value="4" @selected(old('rating', $review->rating) == 4)>4 sao</option>
                                    <option value="5" @selected(old('rating', $review->rating) == 5)>5 sao</option>
                                </select>
                                @error('rating')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea class="form-control" id="noi_dung" rows="10" cols="50" name="description"
                                    rows="3">{{old('description', $review->description)}}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select class="form-control" name="status" id="">
                                    <option >Lựa chọn trạng thái</option>
                                    <option value="1" @selected(old('status', $review->status) == 1)>Hiện</option>
                                    <option value="0" @selected(old('status', $review->status) == 0)>Ẩn</option>
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