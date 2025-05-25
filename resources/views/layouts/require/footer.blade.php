<!-- Footer Section Start -->
<footer class="section-t-space footer-section-2 footer-color-3">
    <div class="container-fluid-lg">
        <div class="sub-footer sub-footer-lite section-b-space section-t-space">
            <div class="left-footer">
                <p class="light-text">2025 Copyright By Vu Hai Lam</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- latest jquery-->
<script src="{{asset('assets/FE/js/jquery-3.6.0.min.js')}}"></script>

<!-- jquery ui-->
<script src="{{asset('assets/FE/js/jquery-ui.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/FE/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/FE/js/bootstrap/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/FE/js/bootstrap/popper.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('assets/FE/js/feather/feather.min.js')}}"></script>
<script src="{{asset('assets/FE/js/feather/feather-icon.js')}}"></script>

<!-- Lazyload Js -->
<script src="{{asset('assets/FE/js/lazysizes.min.js')}}"></script>

<!-- Slick js-->
<script src="{{asset('assets/FE/js/slick/slick.js')}}"></script>
<script src="{{asset('assets/FE/js/slick/slick-animation.min.js')}}"></script>
<script src="{{asset('assets/FE/js/slick/custom_slick.js')}}"></script>

<!-- Auto Height Js -->
<script src="{{asset('assets/FE/js/auto-height.js')}}"></script>

<!-- WOW js -->
<script src="{{asset('assets/FE/js/wow.min.js')}}"></script>
<script src="{{asset('assets/FE/js/custom-wow.js')}}"></script>

<!-- script js -->
<script src="{{asset('assets/FE/js/script.js')}}"></script>

<!-- theme setting js -->
<script src="{{asset('assets/FE/js/theme-setting.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper(".tf-sw-slideshow", {
                slidesPerView: 1, // Hiển thị 1 slide mỗi lần
                loop: true, // Vòng lặp vô hạn
                autoplay: {
                    delay: 2000, // Chuyển slide mỗi 2 giây
                    disableOnInteraction: false // Không dừng autoplay khi người dùng tương tác
                },
                speed: 1000, // Tốc độ chuyển slide (ms)
                pagination: {
                    el: ".sw-pagination-slider",
                    clickable: true, // Cho phép bấm vào dots để chuyển slide
                },
                effect: "fade", // Hiệu ứng fade giữa các slide
                fadeEffect: {
                    crossFade: true // Làm mờ slide cũ trước khi hiển thị slide mới
                }
            });
        });
</script>
<!-- jQuery (nếu chưa có) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Script xử lý hiển thị toast -->
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 13:12:54 GMT -->

</html>