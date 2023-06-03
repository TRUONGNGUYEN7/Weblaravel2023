     <link href="{{ asset('assetuser2/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assetuser2/vendors/fontawesome/css/all.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assetuser2/vendors/themify-icons/themify-icons.css') }}" rel="stylesheet">
     <link href="{{ asset('assetuser2/vendors/nice-select/nice-select.css') }}" rel="stylesheet">
     <link href="{{ asset('assetuser2/vendors/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assetuser2/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assetuser2/css/style.css') }}" rel="stylesheet">
     <!--================ Start Header Menu Area =================-->
     <header class="header_area">
         <div class="main_menu">
             <nav class="navbar navbar-expand-lg navbar-light">
                 <div class="container">
                     <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse"
                         data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="false" aria-label="Toggle navigation">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                     <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                         <ul class="nav navbar-nav menu_nav ml-auto mr-auto">

                             <li class="nav-item active submenu dropdown">
                                 <a href="{{ URL::to('/trangchu') }}" class="nav-link dropdown-toggle">Trang chủ</a>

                             </li>
                             <li class="nav-item submenu dropdown">
                                 <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                     role="button" aria-haspopup="true" aria-expanded="false">Tin tức</a>
                                 <ul class="dropdown-menu">
                                     <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                     <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a>
                                     </li>
                                 </ul>
                             </li>
                
                             <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                         </ul>

                         <ul class="nav-shop">
                             <li class="nav-item"><button><i class="ti-search"></i></button></li>
                             <li class="nav-item">
                                <a href="/shopping_cart"><i class="fa fa-shopping-cart"></i> Cart</a>
                            </li>
                             <li class="nav-item">
                                 <div style="margin: 0px 0px -6px 0px;" class="header__top__right__social">
                                     <?php
                                     $username = Session::get('user_username');
                                     $avgg = Session::get('avatargoogle');
                                     ?>

                                     @if ($username)
                                         <span>{{ $username }}
                                             <img src="{{ $avgg }}" style="width:40px; height: 40px;"> | </span>
                                         <a href="{{ URL::to('/user/logout') }}"><i class="fas fa-sign-out-alt"></i>
                                             Đăng
                                             xuất</a>
                                     @else
                                         <table>
                                             <tr>
                                                 <td>
                                                     <a style="font-size: 17px; margin-top: 30x"
                                                         href="{{ URL::to('/user/showlogin') }}"><i
                                                             class="fas fa-sign-in-alt"></i>
                                                         Đăng
                                                         nhập</a>
                                                 </td>
                                                 <td>
                                                     <a style="font-size: 17px" href="{{ URL::to('/user/signup') }}"><i
                                                             class="fas fa-user-plus"></i>
                                                         Đăng ký</a>
                                                 </td>
                                             </tr>
                                         </table>
                                     @endif
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>
             </nav>
         </div>
     </header>

     <script src="{{ asset('assetuser2/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
     <script src="{{ asset('assetuser2/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('assetuser2/vendors/skrollr.min.js') }}"></script>
     <script src="{{ asset('assetuser2/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('assetuser2/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
     <script src="{{ asset('assetuser2/vendors/jquery.ajaxchimp.min.js') }}"></script>
     <script src="{{ asset('assetuser2/vendors/mail-script.js') }}"></script>
     <script src="{{ asset('assetuser2/js/main.js') }}"></script>
