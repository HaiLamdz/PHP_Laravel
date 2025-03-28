@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh Sách Sản Phẩm</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table id="example1" style="text-align: center" class="table table-bordered table-striped">
            <form action="{{ route('admin.banner.list') }}" method="get">
                <div class="d-flex mb-3">
                    <input type="text" name="title" value="{{ request('title') }}" class="form-control col-3"
                        style="margin-left: 100px" placeholder="Tìm kiếm theo tiêu đề banner...">
                    <select name="status" class="form-control col-3" style="margin-left: 50px" id="">
                        <option value="">Tìm kiếm theo trang thái...</option>
                        <option value="1" @selected(request('status')=='1' )>Hoạt Động</option>
                        <option value="0" @selected(request('status')=='0' )>Bị Ẩn</option>
                    </select>
                    <div class="col-3 d-flex" style="margin-left: 50px">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.banner.list') }}" class="btn btn-secondary w-100 ms-3">
                            <i class="fas fa-sync"></i> Làm mới
                        </a>
                    </div>
                </div>
            </form>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu Đề</th>
                    <th>Hình Ảnh</th>
                    <th>Trạng Thái</th>
                    <th>ACtion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        @if (!empty($item->image))
                        <img width="150px" src="{{asset('storage/' . $item->image)}}" alt="">
                        @else
                        <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge bg-success">Hoạt Động</span>
                        @else
                        <span class="badge bg-danger">Bị Ẩn</span>
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
                                <form action="{{route('admin.banner.trash.restore', $item->id)}}" method="post"
                                    onsubmit="return confirm('xác nhận khôi phục')">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i class="fa-regular fa-pen-to-square"
                                            style="color: #FFD43B;"></i><span style="margin-left: 0.5rem">Khôi
                                            Phục</span></button>
                                </form>
                                <form action="{{route('admin.banner.trash.forceDelete', $item->id)}}" method="POST"
                                    onsubmit="return confirm('xác nhận xóa vĩnh viễn')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i class="fa-solid fa-trash"
                                            style="color: #f50529;"></i><span style="margin-left: 0.5rem">Xóa Vĩnh
                                            Viễn</span></button>
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
                    <th>Tiêu Đề</th>
                    <th>Hình Ảnh</th>
                    <th>Trạng Thái</th>
                    <th>ACtion</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $banners->links() }}
    </div>
    <!-- /.card-body -->
</div>
@endsection