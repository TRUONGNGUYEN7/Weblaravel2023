@extends('layout')
@section('content')

    <link href="{{ asset('assetuser2/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/nice-select/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/css/style.css') }}" rel="stylesheet">

    <!-- Start Filter Bar -->
    <!--features_items-->
    <h2 class="title text-center">Thương hiệu sản phẩm</h2>
    <br>
    <section class="lattest-product-area pb-40 category-list">

        <div class="row">

            @if (isset($dsspbythuonghieu))
                @foreach ($dsspbythuonghieu as $key => $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                <img class="card-img" src="/hinhanh/{{ $item->hinhanh }}" alt="">
                                <ul class="card-product__imgOverlay">
                                    <li><button><i class="ti-search"></i></button></li>
                                    <li><button><i class="ti-shopping-cart"></i></button></li>
                                    <li><button><i class="ti-heart"></i></button></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <p>Accessories</p>
                                <h4 class="card-product__title"><a href="#">{{ $item->tensp }}</a></h4>
                                <p class="card-product__price">${{ $item->gia }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1>khong co san pham</h1>
            @endif
        </div>
    </section>
    <!-- End Best Seller -->

@endsection
