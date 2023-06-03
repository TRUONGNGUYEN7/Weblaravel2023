@include('user.chitiet.header')
<link href="{{ asset('assetuser2/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/fontawesome/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/themify-icons/themify-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/nice-select/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/css/style.css') }}" rel="stylesheet">

<script src="{{ asset('js/share.js') }}"></script>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    #social-links ul {
        padding-left: 0;
    }

    #social-links ul li {

        display: inline-block;
    }

    #social-links ul li a {
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 1px;
        font-size: 25px;
    }

    #social-links .fa-facebook {
        color: #0d6efd;
    }

    #social-links .fa-twitter {
        color: deepskyblue;
    }

    #social-links .fa-linkedin {
        color: #0e76a8;
    }

    #social-links .fa-whatsapp {
        color: #25D366
    }

    #social-links .fa-reddit {
        color: #FF4500;
        ;
    }

    #social-links .fa-telegram {
        color: #0088cc;
    }
</style>

@foreach ($ttsanpham as $key => $item)
    <!--================Single Product Area =================-->
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="/hinhanh/{{ $item->hinhanh }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $item->tensp }}</h3>
                    <h2>${{ $item->gia }}</h2>
                    <ul class="list">

                        @foreach ($thchon as $key => $th)
                            <li><a class="active" href="#"><span>Thể loại</span> : {{ $th->tenth }}</a>
                            </li>
                        @endforeach
                        <li><a href="#"><span>Tình trạng</span> : Mới</a></li>
                    </ul>
                    <ul class="list">{{ $item->motasp }}
                    </ul>
                    <form action="{{ URL::to('/save_cart') }}" method="POST" class="product-count">
                        @csrf
                        <div class="product_count">
                            <label for="qty">Số lượng:</label>
                            <table>
                                <tr>
                                    {{-- <td>
                                        <button style="margin: 0px 0px 0px 0px"
                                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                            class="reduced items-count" type="button"><i class="ti-angle-right"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button  style="margin: 0px -27px 12px 0px;"
                                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                            class="increase items-count" type="button"><i class="ti-angle-left"></i>

                                        </button>
                                    </td> --}}
                                    <td style="font-size: 25px">

                                        <input type="number" min="1" max="10" height="100px"
                                            name="soluong" id="sst" size="2" maxlength="12" value="1"
                                            title="Quantity:" class="input-text qty">

                                        <input type="hidden" name="idsp" value="{{ $item->idsp }}">


                                    </td>
                                    <td>
                                        <button
                                            style="background-color: #5456e7; color: aliceblue ;margin: -28px -251px -28px -11px;"
                                            class="btn" type="submit">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm giỏ hàng
                                        </button>
                                    </td>
                                </tr>
                            </table>


                            <style>
                                .btn {
                                    font-size: 1.2rem;
                                    padding: 1rem 2.5rem;
                                    border: none;
                                    outline: none;
                                    border-radius: 0.4rem;
                                    cursor: pointer;
                                    text-transform: uppercase;
                                    background-color: rgb(245, 245, 249);
                                    color: rgb(255, 255, 255);
                                    font-weight: 700;
                                    transition: 0.6s;
                                    box-shadow: 0px 0px 60px #abd9f1;
                                    -webkit-box-reflect: below 10px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(255, 237, 237, 0.4));
                                }

                                .btn:active {
                                    scale: 0.92;
                                }

                                .btn:hover {
                                    background: rgb(8, 56, 146);
                                    background: linear-gradient(270deg, rgba(9, 86, 228, 0.681) 0%, rgba(31, 215, 232, 0.873) 60%);
                                    color: rgb(4, 4, 38);
                                }
                            </style>
                    </form>
                </div>




                <div class="social-btn-sp">
                    {!! $shareButtons1 !!}
                </div>
                {{-- <div class="card_area d-flex align-items-center">
                    <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                    <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                </div> --}}
                <br>
                <div class="fb-like" data-href="http://127.0.0.1:8000/chi-tiet-san-pham/7" data-width="" data-layout=""
                    data-action="" data-size="" data-share="true">
                </div>
            </div>
        </div>

        <div style="width: 1000px;" id="review">
            <form action="{{ URL::to('user/them-binhluan/'.$item->idsp) }}" method="POST" class="review-form">
                {{ csrf_field() }}
                <div class="container mt-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-8">
                            <div class="review-heading">BÌNH LUẬN</div>
                            <div class="d-flex flex-column comment-section">
                                <div class="bg-light p-2">
                                    <div class="d-flex flex-row align-items-start">
                                        @if (Session::get('avartar') != null)
                                            <img class="rounded-circle" src="<?php echo Session::get('avartar'); ?>" width="40">
                                        @endif
                                        <textarea name="noidung" class="form-control ml-1 shadow-none textarea"></textarea>
                                    </div>
                                    <div class="mt-2 text-right">
                                        <button style="background-color: #70a0ba"
                                            class="btn btn-primary btn-sm shadow-none" type="submit">Bình luận</button>
                                    </div>
                                </div>
                                @if (count($dsbinhluan) != 0)
                                    @foreach ($dsbinhluan as $value)
                                        <div class="bg-white p-2">
                                            <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                                    src="{{ $value->Avatar }}" width="40">
                                                <div class="d-flex flex-column justify-content-start ml-2"><span
                                                        class="d-block font-weight-bold name">{{ $value->username }}</span><span
                                                        class="date text-black-50">{{ $value->create_at }}</span>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <p class="comment-text">{{ $value->noidung }}</p>
                                            </div>
                                        </div>
                                        <div class="bg-white">
                                            <div class="d-flex flex-row fs-12">
                                                <div class="like p-2 cursor"><i class="fas fa-thumbs-up"></i><span
                                                        class="ml-1">Like</span></div>
                                                <div class="like p-2 cursor"><i class="fas fa-comments"></i><span
                                                        class="ml-1">Comment</span></div>
                                                <div class="like p-2 cursor"><i class="fa fa-share"></i><span
                                                        class="ml-1">Share</span></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div> Chưa có bình luận </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- <div class="fb-comments" data-href="http://127.0.0.1:8000/chi-tiet-san-pham/7" data-width="" data-numposts="5">
        </div> --}}

    </div>
    </div>
    </div>
    <!--================End Single Product Area =================-->

    <br>
    <br>
    <!--================ Start footer Area  =================-->
    <footer>
        <div class="footer-area footer-only">
            <div class="container">
                <div class="row section_gap">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets ">
                            <h4 class="footer_title large_title">Our Mission</h4>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no
                                divided deep moved us lan Gathering thing us land years living.
                            </p>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no divided
                                deep moved
                            </p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Quick Links</h4>
                            <ul class="list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Product</a></li>
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h4 class="footer_title">Gallery</h4>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="img/gallery/r1.jpg" alt=""></li>
                                <li><img src="img/gallery/r2.jpg" alt=""></li>
                                <li><img src="img/gallery/r3.jpg" alt=""></li>
                                <li><img src="img/gallery/r5.jpg" alt=""></li>
                                <li><img src="img/gallery/r7.jpg" alt=""></li>
                                <li><img src="img/gallery/r8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>
                                    Head Office
                                </p>
                                <p>123, Main Street, Your City</p>

                                <p class="sm-head">
                                    <span class="fa fa-phone"></span>
                                    Phone Number
                                </p>
                                <p>
                                    +123 456 7890 <br>
                                    +123 456 7890
                                </p>

                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span>
                                    Email
                                </p>
                                <p>
                                    free@infoexample.com <br>
                                    www.infoexample.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </footer>
@endforeach
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0"
    nonce="PRHYWEDN"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0"
    nonce="U55GLK9O"></script>
