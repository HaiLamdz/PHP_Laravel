@extends('layouts.app')
@section('title', $product->ten_san_pham)
@section('content')
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row g-2">
                                <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                    <div class="product-main-2 no-arrow">
                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}" id="img-1"
                                                    data-zoom-image="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="lỗi ảnh">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    data-zoom-image="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid image_zoom_cls-1 blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    data-zoom-image="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid image_zoom_cls-2 blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    data-zoom-image="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid image_zoom_cls-3 blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    data-zoom-image="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid image_zoom_cls-4 blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    data-zoom-image="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid image_zoom_cls-5 blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                    <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                        <div>
                                            <div class="sidebar-image">
                                                <img src=".{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{asset('storage/' . $product->hinh_anh)}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            <h6 class="offer-top">30% Off</h6>
                            <h2 class="name">{{$product->ten_san_pham}}</h2>
                            <div class="price-rating">
                                <h3 class="theme-color price">{{number_format($product->gia_khuyen_mai)}}<del
                                        class="text-content">{{number_format($product->gia_san_pham)}}</del> <span
                                        class="offer theme-color">({{(number_format($product->gia_khuyen_mai /
                                        $product->gia_san_pham)) * 1}}% off)</span></h3>

                            </div>

                            <div class="product-contain">
                                <p>Số Lượng Trong Kho: {{$product->so_luong}}</p>
                            </div>
                            <div class="product-contain">
                                <p>{!!$product->mo_ta!!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="product-section-box">
                            <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                        data-bs-target="#review" type="button" role="tab">Review</button>
                                </li>
                            </ul>

                            <div class="tab-content custom-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="product-description">
                                        <div class="nav-desh">
                                            <p>{!!$product->mo_ta!!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel">

                                    @if (Auth::check())
                                    <div class="review-box">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="review-people">
                                                    <ul class="review-list">
                                                        @foreach ($review as $item)
                                                        <li>
                                                            <div class="people-box">
                                                                <div class="people-comment">
                                                                    <div class="people-name"><a href="#"
                                                                            class="name">{{$item->customer->name}}</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content">{{date('H:i d-m-Y',
                                                                                strtotime($item->created_at))}}</h6>
                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    @for ($i = 1; $i <= 5; $i++) @if ($i
                                                                                        <=$item->rating)
                                                                                        <i class="fas fa-star"
                                                                                            style="color: #FFD43B"></i>
                                                                                        @else
                                                                                        <i class="far fa-star"
                                                                                            style="color: gray"></i>
                                                                                        @endif
                                                                                        @endfor
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <p>{!!$item->description!!}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <button class="btn"
                                                    style="background-color: #f8f8f8; border: 1px solid black; margin-bottom: 20px;"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#writereview">Viết Đánh Giá</button>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <h3>hãy Đăng Nhập Để Xem Và Đánh Giá Sản Phẩm</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                <div class="right-sidebar-box">
                    <!-- Trending Product -->
                    <div class="pt-25">
                        <div class="category-menu">
                            <h3>Sản Phẩm Tượng Tự</h3>

                            <ul class="product-list product-right-sidebar border-0 p-0">
                                @foreach ($product_cate as $item)
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{asset('storage/' . $item->hinh_anh)}}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">{{$item->ten_san_pham}}</h6>
                                                </a>
                                                <span><del>{{$item->gia_san_pham}}</del></span>
                                                <h6 class="price theme-color">{{$item->gia_khuyen_mai}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Banner Section -->
                    <div class="ratio_156 pt-25">
                        <div class="home-contain">
                            <img src="../assets/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h6 class="text-yellow home-banner">Seafood</h6>
                                    <h3 class="text-uppercase fw-normal"><span
                                            class="theme-color fw-bold">Freshes</span> Products</h3>
                                    <h3 class="fw-light">every hour</h3>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade theme-modal question-modal" id="writereview" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{route('review')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Viết Đánh Giá</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="product-review-form">
                        <div class="product-wrapper">
                            <div class="product-image">
                                <img class="img-fluid" alt="{{$product->ten_san_pham}}"
                                    src="{{asset('storage/' . $product->hinh_anh)}}">
                            </div>
                            <div class="product-content">
                                <h5 class="name">{{$product->ten_san_pham}}</h5>
                            </div>
                        </div>
                        <div class="review-box">
                            <div class="product-review-rating">
                                <label>Rating</label>
                                <div class="product-rating">
                                    <div class="list-rating-check">
                                        <input type="radio" id="star5" name="rating" value="5">
                                        <label for="star5" title="5 sao"></label>
                                        <input type="radio" id="star4" name="rating" value="4">
                                        <label for="star4" title="4 sao"></label>
                                        <input type="radio" id="star3" name="rating" value="3">
                                        <label for="star3" title="3 sao"></label>
                                        <input type="radio" id="star2" name="rating" value="2">
                                        <label for="star2" title="2 sao"></label>
                                        <input type="radio" id="star1" name="rating" value="1">
                                        <label for="star1" title="1 sao"></label>
                                    </div>
                                </div>
                                @error('rating')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="review-box">
                            <label for="content" class="form-label">Đánh Giá:</label>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <textarea id="content" rows="3" class="form-control" name="description"
                                placeholder="Đánh Giá CỦa Bạn"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-theme-outline fw-bold"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md fw-bold text-light theme-bg-color">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Product Left Sidebar End -->
@endsection