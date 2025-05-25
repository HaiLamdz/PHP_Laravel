<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 13:12:50 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="{{asset('assets/FE/images/favicon/7.png')}}" type="image/x-icon">
    <title>@yield('title') - HaiLam</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;family=Qwitcher+Grypen:wght@400;700&amp;display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('assets/FE/css/vendors/bootstrap.css')}}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{asset('assets/FE/css/animate.min.css')}}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/FE/css/bulk-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/FE/css/vendors/animate.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/FE/css/style.css')}}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/FE/css/custom.css')}}">
    {{-- thông báo toast --}}
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
</head>
<style>
    /* đánh giá luw3aj chọn sao */
    .list-rating-check {
        display: flex;
        flex-direction: row-reverse;
    }

    .list-rating-check input {
        display: none;
    }

    .list-rating-check label {
        font-size: 40px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .list-rating-check label:before {
        content: "\2605";
        /* Ký tự ngôi sao Unicode */
    }

    .list-rating-check input:checked~label,
    .list-rating-check label:hover,
    .list-rating-check label:hover~label {
        color: #ffb321;
    }
</style>

<body class="theme-color-5">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->