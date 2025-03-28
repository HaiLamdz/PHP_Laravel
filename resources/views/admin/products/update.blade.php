@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa Sản Phẩm</h1>
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
                        <h3 class="card-title">Sửa Sản Phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.product.update', $product->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                                <input type="text" name="ma_san_pham" @error('ma_san_pham') is-invalid @enderror
                                    value="{{old('ma_san_pham', $product->ma_san_pham)}}" class="form-control">
                                @error('ma_san_pham')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" name="ten_san_pham" class="form-control"
                                    value="{{ old('ten_san_pham',$product->ten_san_pham)}}" placeholder="Enter Name Product">
                                @error('ten_san_pham')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh Mục</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{ old('category_id', $product->category_id) ==
                                        $item->id ? 'selected' : ''}}>{{$item->ten_danh_muc}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá Sản Phẩm</label>
                                <input type="text" name="gia_san_pham" value="{{old('gia_san_pham', $product->gia_san_pham)}}"
                                    class="form-control" placeholder="Enter Price">
                                @error('gia_san_pham')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá Khuyễn Mãi</label>
                                <input type="text" name="gia_khuyen_mai" value="{{old('gia_khuyen_mai',$product->gia_khuyen_mai)}}"
                                    class="form-control" placeholder="Enter Promotion Price">
                                @error('gia_khuyen_mai')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số Lượng</label>
                                <input type="number" name="so_luong" value="{{old('so_luong',$product->so_luong)}}" class="form-control"
                                    placeholder="Enter Promotion Price">
                                @error('so_luong')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ngày Nhập</label>
                                <input type="date" name="ngay_nhap" value="{{old('ngay_nhap',$product->ngay_nhap)}}" class="form-control"
                                    placeholder="Enter Promotion Price">
                                @error('ngay_nhap')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="hinh_anh" class="form-control">
                                @error('hinh_anh')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if (!empty($product->hinh_anh))
                                <img width="150px" src="{{asset('storage/' . $product->hinh_anh)}}"
                                    alt="{{$product->ten_san_pham}}">
                                @else
                                <span>Chưa có ảnh</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea class="form-control" id="noi_dung" rows="10" cols="50" name="mo_ta"
                                    rows="3">{{old('mo_ta',$product->mo_ta)}}</textarea>
                                @error('mo_ta')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select class="form-control" name="trang_thai" id="">
                                    <option value="1" {{$product->trang_thai == 1 ? 'selected' : ''}}>Còn Hàng</option>
                                    <option value="0" {{$product->trang_thai == 0 ? 'selected' : ''}}>Hết Hàng</option>
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