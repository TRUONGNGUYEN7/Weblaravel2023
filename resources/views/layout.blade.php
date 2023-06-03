<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/4/w3.css') }}">
    <style>
        .mySlides {
            display: none
        }

        .w3-left,
        .w3-right,
        .w3-badge {
            cursor: pointer
        }

        .w3-badge {
            height: 13px;
            width: 13px;
            padding: 0;
            color:
        }
    </style>
    <link rel="icon" href="img/Fevicon.png" type="image/png">

    <link href="{{ asset('assetuser2/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/nice-select/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetuser2/css/style.css') }}" rel="stylesheet">

</head>
<!--/head-->

<body>

    @include('user.chitiet.header')

    <!-- ================ start banner area ================= -->

    <section style="margin-bottom: -70px" id="slider">
        @include('user.chitiet.slider')
    </section>
    <!--/slider-->

    <!-- Categories Section End -->

    <!-- ================ category section start ================= -->
    <section class="section-margin--small mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="sidebar-categories">
                        <div class="head">Danh mục</div>
                        <ul class="main-categories">
                            <li class="common-filter">
                                <ul>
                                    @foreach ($dsdanhmuc as $key => $dm)
                                        <li class="filter-list">
                                            <a style="margin-left: 30px; font-size: 17px" id="apple"
                                                href="{{ URL::to('/danh-muc-san-pham/' . $dm->iddanhmuc) }}">
                                                {{ $dm->tendanhmuc }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <br>
                        <div class="sidebar-categories">
                            <div class="head">Hãng</div>
                            <ul class="main-categories">
                                <li class="common-filter">
                                    <ul>
                                        @foreach ($dsthuonghieu as $key => $th)
                                            <li class="filter-list">
                                                <a style="margin-left: 30px; font-size: 17px" id="apple"
                                                    href="{{ URL::to('/danh-muc-san-pham/' . $th->idth) }}">
                                                    {{ $th->tenth }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <!-- ================ category section end ================= -->

    @include('user.chitiet.footer')
    <!-- ================ Subscribe section start ================= -->

    <!--================ End footer Area  =================-->
    <script src="{{ asset('assetuser2/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assetuser2/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetuser2/vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('assetuser2/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetuser2/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assetuser2/vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assetuser2/vendors/mail-script.js') }}"></script>
    <script src="{{ asset('assetuser2/js/main.js') }}"></script>
</body>



</html>
