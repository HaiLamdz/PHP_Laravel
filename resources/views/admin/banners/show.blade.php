@extends('admin.layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">E-commerce</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-5">
                    <h3 class="d-inline-block d-sm-none">{{$product->ten_san_pham}}</h3>
                    <div class="col-12">
                        <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg"
                                alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-7">
                    <h3 class="my-3">{{$product->ten_san_pham . ' - ' . $product->ma_san_pham}}</h3>
                    <hr>
                    <h4 class="mt-3">Danh Mục: {{$product->category->ten_danh_muc}}</h4>
                    <h4 class="mt-3">Giá Sản Phẩm: {{number_format($product->gia_san_pham)}}vnđ</h4>
                    <h4 class="mt-3">Giá Khuyến Mãi: {{number_format($product->gia_khuyen_mai)}}vnđ</h4>
                    <h4 class="mt-3">Số Lượng: {{$product->so_luong}} chiếc</h4>
                    <h4 class="mt-3">Số Lượng: {{date('d-m-Y', strtotime($product->ngay_nhap))}}</h4>
                    <h4 class="mt-3">Trạng Thái:
                        @if ($product->trang_thai)
                        <span class="badge bg-success">Còn Hàng</span>
                        @else
                        <span class="badge bg-danger">Hết Hàng</span>
                        @endif
                    </h4>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                            role="tab" aria-controls="product-desc" aria-selected="true">Mô tả</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                            href="#product-comments" role="tab" aria-controls="product-comments"
                            aria-selected="false">Bình Luận</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                            role="tab" aria-controls="product-rating" aria-selected="false">Đánh Giá</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                        aria-labelledby="product-desc-tab"> {{$product->mo_ta}}</div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel"
                        aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                        condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                        commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis
                        elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare,
                        eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod
                        lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget,
                        ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui.
                        Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean
                        elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque.
                        Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod
                        neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh
                        rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl.
                        Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit,
                        at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta
                        lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper.
                        Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content-wrapper -->
@endsection