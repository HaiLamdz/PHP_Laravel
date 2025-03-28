@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Thùng Rác</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table id="example1" style="text-align: center" class="table table-bordered table-striped">
            <form action="{{ route('admin.product.trash.list') }}" method="get">
                <div class="d-flex mb-3">
                    <input type="text" name="ma_san_pham" value="{{ request('ma_san_pham') }}"
                        class="form-control col-3" style="margin-left: 100px"
                        placeholder="Tìm kiếm theo mã sản phẩm...">
                    <input type="text" name="ten_san_pham" value="{{ request('ten_san_pham') }}"
                        class="form-control col-3" style="margin-left: 50px"
                        placeholder="Tìm kiếm theo tên sản phẩm...">
                    <input type="text" name="gia_min" value="{{ request('gia_min') }}" class="form-control"
                        style="margin-left: 50px; width: 161px;" placeholder="Giá min...">
                    <input type="text" name="gia_max" value="{{ request('gia_max') }}" class="form-control"
                        style="margin-left: 20px; width: 161px;" placeholder="Giá max...">
                    {{-- <button class="btn btn-primary" type="submit" id="button-addon2"><i
                            class="fas fa-search"></i></button> --}}
                </div>
                <div class="d-flex mb-3">
                    <input type="date" name="ngay_nhap" value="{{ request('ngay_nhap') }}" class="form-control col-3"
                        style="margin-left: 100px" placeholder="Tìm kiếm theo ngày nhập sản phẩm...">
                    {{-- <input type="text" name="ma_san_pham" value="{{ request('ma_san_pham') }}"
                        class="form-control col-3" style="margin-left: 50px"
                        placeholder="Tìm kiếm theo trạng thái sản phẩm..."> --}}
                    <select name="trang_thai" class="form-control col-3" style="margin-left: 50px" id="">
                        <option value="">Tìm kiếm theo trang thái...</option>
                        <option value="1" @selected(request('trang_thai') == '1')>Còn Hàng</option>
                        <option value="0" @selected(request('trang_thai') == '0')>Hết Hàng</option>
                    </select>
                    <select name="category_id" class="form-control col-3" style="margin-left: 50px" id="">
                        <option value="">Tìm kiếm theo danh mục...</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}" @selected(request('category_id') == $item->id)>{{$item->ten_danh_muc}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3 d-flex" style="margin-left: 50%">
                    <button type="submit" class="btn btn-primary w-100 me-1">
                        <i class="fas fa-search"></i> Tìm kiếm
                    </button>
                    <a href="{{ route('admin.product.trash.list') }}" class="btn btn-secondary w-100 ms-3">
                        <i class="fas fa-sync"></i> Làm mới
                    </a>
                </div>
            </form>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Ảnh Sản Phẩm</th>
                    <th>Danh Mục</th>
                    <th>Giá SP</th>
                    <th>Số Lượng</th>
                    <th>Trạng Thái</th>
                    <th>ACtion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->ma_san_pham}}</td>
                    <td>{{$item->ten_san_pham}}</td>
                    {{-- <td> <img src="{{asset('storage/' . $item->hinh_anh)}}" alt=""> </td> --}}
                    <td>
                        @if (!empty($item->hinh_anh))
                        <img width="150px" src="{{asset('storage/' . $item->hinh_anh)}}" alt="">
                        @else
                        <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td>{{$item->category->ten_danh_muc}}</td>
                    <td>{{number_format($item->gia_san_pham)}}vnđ</td>
                    <td>{{$item->so_luong}} Chiếc</td>
                    <td>
                        @if ($item->trang_thai == 1)
                        <span class="badge bg-success">Còn Hàng</span>
                        @else
                        <span class="badge bg-danger">Hết Hàng</span>
                        @endif
                    </td>
                    <td>
                        {{-- <a href="{{route('admin.product.show', $item->id)}}"><button
                                class="btn btn-info">Xem</button></a>
                        <a href="{{route('admin.product.edit', $item->id)}}"><button
                                class="btn btn-warning">Sửa</button></a>
                        <a href=""><button class="btn btn-danger">Xóa</button></a> --}}
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-sliders"></i>
                            </button>
                            <div class="dropdown-menu dropleft" x-placement="left-start"
                                style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform; border: 1px solid black;">
                                <form action="{{route('admin.product.trash.restore', $item->id)}}" method="post"
                                    onsubmit="return confirm('xác nhận khôi phục')">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i
                                        class="fa-regular fa-pen-to-square" style="color: #FFD43B;"></i><span
                                        style="margin-left: 0.5rem">Khôi Phục</span></button>
                                </form>
                                <form action="{{route('admin.product.trash.forceDelete', $item->id)}}" method="POST"
                                    onsubmit="return confirm('xác nhận xóa vĩnh viễn')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i class="fa-solid fa-trash"
                                            style="color: #f50529;"></i><span
                                            style="margin-left: 0.5rem">Xóa Vĩnh Viễn</span></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Danh Mục</th>
                    <th>Giá SP</th>
                    <th>Số Lượng</th>
                    <th>Trạng Thái</th>
                    <th>ACtion</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
    <!-- /.card-body -->
</div>
@endsection