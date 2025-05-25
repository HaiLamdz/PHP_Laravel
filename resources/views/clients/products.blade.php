@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="width: 80%;">
    <div class="row">
        <!-- Filters Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Bộ lọc</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('shop') }}" method="GET">
                        {{-- @csrf --}}
                        <!-- Search -->
                        <div class="mb-3">
                            <label for="search" class="form-label">Tìm kiếm</label>
                            <input type="text" class="form-control" id="search" placeholder="Tìm Kiếm Theo Tên" name="ten_san_pham" value="{{ request('search') }}">
                        </div>

                        <!-- Category Filter -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Danh mục</label>
                            <select class="form-select" id="category" name="category_id">
                                <option value="">Tất cả</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->ten_danh_muc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-3">
                            <label class="form-label">Khoảng giá</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" class="form-control" name="min_price" placeholder="Từ" value="{{ request('min_price') }}">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" name="max_price" placeholder="Đến" value="{{ request('max_price') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Sort -->
                        <div class="mb-3">
                            <label for="sort" class="form-label">Sắp xếp</label>
                            <select class="form-select" id="sort" name="sort">
                                <option value="">Mặc định</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Áp dụng</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products List -->
        <div class="col-md-9">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4 ">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $product->hinh_anh) }}" class="card-img-top" alt="{{ $product->ten_san_pham }}">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{route('product_detail', $product->id)}}">{{ $product->ten_san_pham }}</a></h5>
                                <p class="card-text">{{ number_format($product->gia_san_pham) }} VNĐ</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 