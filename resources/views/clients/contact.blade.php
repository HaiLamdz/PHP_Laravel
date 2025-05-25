@extends('layouts.app')
@section('title', 'Liên Hệ')
@section('content')

<section class="contact-box-section">
    <div class="container-fluid-lg">
        <div class="row g-lg-5 g-3">
            <div class="col-lg-6">
                <div class="left-sidebar-box">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-image">
                                <img src="{{asset('assets/FE/images/inner-page/contact-us.png')}}"
                                    class="img-fluid blur-up lazyloaded" alt="lỗi ảnh">
                            </div>
                        </div>
                        {{-- <div class="col-xl-12">
                            <div class="contact-title">
                                <h3>Liên Lạc</h3>
                            </div>

                            <div class="contact-detail">
                                <div class="row g-4">
                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Số Điện Thoại</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Email</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Vị Trí</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-building"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Văn Phòng</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <div class="title d-xxl-none d-block">
                    <h2>Contact Us</h2>
                </div>
                <form action="{{route('contactPost')}}" method="post">
                    @csrf
                    <div class="right-sidebar-box">
                        <div class="row">
                            <div class="col-xxl-12 col-lg-12 col-sm-12">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput" class="form-label">Họ Và Tên</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput"
                                            placeholder="Nhập Họ Và Tên">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput2" class="form-label">Địa Chỉ Email</label>
                                    <div class="custom-input">
                                        <input type="email" class="form-control" name="email" id="exampleFormControlInput2"
                                            placeholder="Nhập Địa Chỉ Email">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput3" class="form-label">Số Điện Thoại</label>
                                    <div class="custom-input">
                                        <input type="tel" class="form-control" id="exampleFormControlInput3"
                                            placeholder="Nhập Số Điện Thoại Của Bạn" name="phone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlTextarea" class="form-label">Tin Nhắn</label>
                                    <div class="custom-textarea">
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea"
                                            placeholder="Nhập Tin Nhắn" rows="6"></textarea>
                                        <i class="fa-solid fa-message"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-animation btn-md fw-bold ms-auto">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div style="margin-bottom: 10vh"></div>
@endsection