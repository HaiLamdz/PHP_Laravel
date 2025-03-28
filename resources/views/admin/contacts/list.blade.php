@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh Sách Sản Phẩm</h3>
        <!-- Form tìm kiếm -->
        {{-- <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm sản phẩm</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('admin.product.list') }}">
                    <div class="row g-3">
                        <!-- Mã sản phẩm -->
                        <div class="col-md-3">
                            <label class="form-label">Mã sản phẩm</label>
                            <input type="text" name="ma_san_pham" class="form-control" placeholder="Nhập mã sản phẩm"
                                value="{{ request('ma_san_pham') }}">
                        </div>
                        <!-- Nút tìm kiếm & Làm mới -->
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100 me-1">
                                <i class="fas fa-search"></i> Tìm kiếm
                            </button>
                            <a href="{{ route('admin.product.list') }}" class="btn btn-secondary w-100 ms-1">
                                <i class="fas fa-sync"></i> Làm mới
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table id="example1" style="text-align: center" class="table table-bordered table-striped">
            <form action="{{ route('admin.contact.list') }}" method="get">
                <div class="d-flex mb-3">
                    <input type="text" name="name" value="{{ request('name') }}"
                        class="form-control col-4" style="margin-left: 100px"
                        placeholder="Tìm kiếm theo Tên...">
                    <input type="text" name="email" value="{{ request('email') }}"
                        class="form-control col-4" style="margin-left: 50px"
                        placeholder="Tìm kiếm theo email...">
                </div>
                <div class="d-flex mb-3">
                    <input type="text" name="phone" value="{{ request('phone') }}" class="form-control col-4"
                        style="margin-left: 100px" placeholder="Tìm kiếm theo sdt...">
                    <select name="status" class="form-control col-4" style="margin-left: 50px" id="">
                        <option value="">Tìm kiếm theo trang thái...</option>
                        <option value="1" @selected(request('status') == '1')>Đã Trả Lời</option>
                        <option value="0" @selected(request('status') == '0')>Chưa Trả Lời</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 d-flex" style="margin-left: 50%">
                    <button type="submit" class="btn btn-primary w-100 me-1">
                        <i class="fas fa-search"></i> Tìm kiếm
                    </button>
                    <a href="{{ route('admin.contact.list') }}" class="btn btn-secondary w-100 ms-3">
                        <i class="fas fa-sync"></i> Làm mới
                    </a>
                </div>
            </form>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Mô tả</th>
                    <th>Trạng Thái</th>
                    <th>ACtion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{!!$item->description!!}</td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge bg-success">Đã Trả Lời</span>
                        @else
                        <span class="badge bg-danger">Chưa Trả Lời</span>
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
                                <a class="dropdown-item" href="{{route('admin.contact.edit', $item->id)}}"><i
                                        class="fa-regular fa-pen-to-square" style="color: #FFD43B;"></i><span
                                        style="margin-left: 0.5rem">Sửa</span></a>
                                <form action="{{route('admin.contact.destroy', $item->id)}}" method="POST"
                                    onsubmit="return confirm('xác nhận xóa')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i class="fa-solid fa-trash"
                                            style="color: #f50529;"></i><span
                                            style="margin-left: 0.5rem">Xóa</span></button>
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
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Mô tả</th>
                    <th>Trạng Thái</th>
                    <th>ACtion</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $contacts->links() }}
    </div>
    <!-- /.card-body -->
</div>
@endsection