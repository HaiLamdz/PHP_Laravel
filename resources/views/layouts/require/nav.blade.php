<!-- Header Start -->
<header class="">
    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="fa-solid fa-bars"></i>
                            </span>
                        </button>
                        <a href="index.html" class="web-logo nav-logo">
                            <img src="{{asset('assets/FE/images/logo/6.png')}}" class="img-fluid blur-up lazyload"
                                alt="">
                        </a>

                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <li class="nav-item ">
                                                <a class="nav-link ps-xl-2 ps-0" href="{{route('home')}}">Trang Chủ</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link ps-xl-2 ps-0" href="{{route('shop')}}">Cửa Hàng</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link ps-xl-2 ps-0" href="{{route('post')}}">Bài Viết</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link ps-xl-2 ps-0" href="{{route('contact')}}">Liên Hệ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="bookmark"></i>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            </span>
                                        </button>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    @if (Auth::check())
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>Hello,</h6>
                                                <h5>{{Auth::user()->name}}</h5>
                                            </div>
                                        </div>
                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">
                                                    <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng Xuất</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">
                                                    <a href="{{route('login')}}"><i class="fa-solid fa-right-to-bracket me-2"></i>Đăng Nhập</a>
                                                </li>

                                                <li class="product-box-contain">
                                                    <a href="{{route('registerForm')}}"><i class="fa-solid fa-user-plus me-2"></i>Đăng Ký</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->