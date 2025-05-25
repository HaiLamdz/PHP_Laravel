@extends('layouts.app')
@section('title', 'Trang Chủ')
@section('content')
{{-- banner --}}
<div class="tf-slideshow slider-home-2 slider-effect-fade position-relative">
    <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false"
        data-space="0" data-loop="true" data-auto-play="true" data-delay="2000" data-speed="1000">
        <div class="swiper-wrapper">
            @foreach ($banners as $item)
            <div class="swiper-slide" lazy="true">
                <div class="wrap-slider">
                    <img class="lazyload" style="width: 80vw;  display: block; margin: 0 auto;"
                        data-src="{{asset('storage/' . $item->image)}}" src="{{asset('storage/' . $item->image)}}"
                        alt="fashion-slideshow-01">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- end-banner --}}
<!-- Deal Section Start -->
<section class="product-section product-section-3" style="min-height: 50vh">
    <div class="container-fluid-lg">
        <div class="title">
            <h1>Sản Phẩm Mới Nhất</h1>
        </div>
        <div class="row g-sm-4 g-3">
            @foreach ($products as $item)
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="product-box-5 wow fadeInUp">
                    <div class="product-image">
                        <a href="{{route('product_detail', $item->id)}}">
                            <img src="{{ asset('storage/' . $item->hinh_anh) }}" class="img-fluid"
                                alt="{{ $item->ten_san_pham }}">
                        </a>
                        <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Wishlist">
                            <i data-feather="heart"></i>
                        </a>

                        <ul class="product-option">
                            <li style="margin-left: 31%;" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                <a href="compare.html">
                                    <i data-feather="eye"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-detail">
                        <a href="{{route('product_detail', $item->id)}}">
                            <h5 class="name">{{ $item->ten_san_pham }}</h5>
                        </a>

                        <h5 class="sold text-content">
                            <span class="theme-color price">{{ number_format($item->gia_san_pham) }}đ</span>
                            <del>{{ number_format($item->gia_khuyen_mai) }}đ</del>
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{--
<section class="product-section product-section-3" style="min-height: 50vh">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Sản Phẩm Mới Nhất</h2>
        </div>
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-12 ratio_110">
                <div class="slider-4 img-slider">
                    @foreach ($products as $item)
                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('storage/' . $item->hinh_anh)}}"
                                        class="img-fluid blur-up lazyload bg-img" alt="{{$item->ten_san_pham}}">
                                </a>

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
                                    <i data-feather="heart"></i>
                                </a>

                                <ul class="product-option">
                                    <li style="margin-left: 30%;" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="View">
                                        <a href="compare.html">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">{{$item->ten_san_pham}}</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">{{number_format($item->gia_san_pham)}}đ</span>
                                    <del>{{number_format($item->gia_khuyen_mai)}}đ</del>
                                </h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- <h2>Trang Chủ</h2> --}}
<!-- Deal Section End -->

{{-- bài viết --}}
<section class="product-section product-section-3" style="min-height: 50vh">
    <div class="container-fluid-lg">
        <div class="title">
            <h1>Bài Viết</h1>
        </div>
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-12 ratio_110">
                <div class="slider-4 img-slider">
                    @foreach ($posts as $item)
                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('storage/' . $item->image)}}"
                                        class="img-fluid blur-up lazyload bg-img" alt="{{$item->title}}">
                                </a>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">{{$item->title}}</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">{!!mb_strimwidth(strip_tags($item->description), 0,
                                        100, '...')!!}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-section product-section-3" style="min-height: 50vh">
    <div class="container-fluid-lg">
        <div class="title">
            <h1>Đánh Giá Khách Hàng</h1>
            <p class="sub-title">Khác Hàng Nói Gì Về Sản Phẩm Của Chúng Tôi</p>
        </div>
        <div class="review-section">
            @foreach ($topReviews as $item)
            <div class="review-card">
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$item->rating)
                        <i class="fas fa-star" style="color: #FFD43B"></i>
                        @else
                        <i class="far fa-star" style="color: gray"></i>
                        @endif
                        @endfor
                </div>
                <p class="review-text">{!! mb_strimwidth(strip_tags($item->description), 0, 100, '...') !!}</p>
                <p class="author">
                    @if (!empty($item->customer->name))
                         {{$item->customer->name}}
                    @else
                        Tài Khoản Không Xác Định
                    @endif
                </p>
                <div class="product-info">
                    @if (!empty($item->product->ten_san_pham))
                        <img src="{{asset('storage/' . $item->product->hinh_anh)}}" alt="">
                        <div>
                            <p>{{$item->product->ten_san_pham}}</p>
                            <p>{{number_format($item->product->gia_san_pham)}}</p>
                        </div>
                    @else
                        Sản Phẩm Không Xác Định
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- Đánh giá --}}

@endsection