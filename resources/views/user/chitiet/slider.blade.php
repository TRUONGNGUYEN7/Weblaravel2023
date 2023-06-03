<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('slider/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('slider/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('slider/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('slider/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('slider/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('slider/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
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
<!--slider-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="w3-content w3-display-container" style="max-width:1100px">
                <img class="mySlides" src="{{asset('hinhanh/banner3.jpg')}}" style="width:1100px; height: 300px;">
                <img class="mySlides" src="{{asset('hinhanh/banner1.jpg')}}" style="width:1100px; height: 300px;">
                <img class="mySlides" src="{{asset('hinhanh/banner4.jpg')}}" style="width:1100px; height: 300px;">
                <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle"
                    style="width:100%">

                    <div style="color: black; font-size: 40px; margin: 0px 0px 86px -17px"
                        class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;
                    </div>
                    <div style="color: black; font-size: 40px; margin: 0px -10px 86px 0px"
                        class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;
                    </div>
                    <div style="margin:139px 25px -13px 0px;">
                        <span style="color: black;" class="w3-badge demo w3-border w3-transparent w3-hover-black"
                            onclick="currentDiv(1)"></span>
                        <span style="color: black;" class="w3-badge demo w3-border w3-transparent w3-hover-black"
                            onclick="currentDiv(2)"></span>
                        <span style="color: black;" class="w3-badge demo w3-border w3-transparent w3-hover-black"
                            onclick="currentDiv(3)"></span>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<!--================ End Header Menu Area =================-->
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-white";
        
        
    }

    var slideIndex = 1;

    showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

setInterval(function() {
  slideIndex++;
  showSlides(slideIndex);
}, 3000);
</script>
<br>
    <!-- Start Instagram Feed  -->
    <div style="background-color:rgb(240, 240, 232) ; width: 1000px; height: 123px ; margin-left: 270px; padding: 2px 2px 2px 2px">
        <div class="main-instagram owl-carousel owl-theme">
            @foreach ($dsthuonghieu as $key => $th)
                <div class="item">
                    <?php
                    $n = $th->hinhanh
                    ?>
                    <div class="ins-inner-box">
                        <img style="width: 195px; height: 120px;" src="{{asset('/hinhanh/'.$n) }}" alt="" />
                        <div class="hov-in">
                            <a style="font-size: 29px; border-style: inset;color: rgb(154, 245, 160);" href="{{ URL::to('/thuong-hieu-san-pham/' . $th->idth) }}">{{$th->tenth}}</a>
                        </div>
                    </div>
                </div>
               
            @endforeach




        </div>
    </div>
    <!-- End Instagram Feed  -->

    <!-- ALL JS FILES -->
    <script src="{{asset('slider/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('slider/js/popper.min.js')}}"></script>
    <script src="{{asset('slider/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('slider/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('slider/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('slider/js/inewsticker.js')}}"></script>
    <script src="{{asset('slider/js/bootsnav.js.')}}"></script>
    <script src="{{asset('slider/js/images-loded.min.js')}}"></script>
    <script src="{{asset('slider/js/isotope.min.js')}}"></script>
    <script src="{{asset('slider/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('slider/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('slider/js/form-validator.min.js')}}"></script>
    <script src="{{asset('slider/js/contact-form-script.js')}}"></script>
    <script src="{{asset('slider/js/custom.js')}}"></script>
</body>

</html>
<br>