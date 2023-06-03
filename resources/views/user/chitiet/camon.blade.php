@extends('layout')
@section('content')


<style>
    body{
    margin-top:20px;
    
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}

</style>

<div class="container px-3 my-5 clearfix">
    <h3>Cảm ơn đã đặt hàng <a href="{{URL::to('/')}}">Về trang chủ</a></h3> 
</div>

@endsection