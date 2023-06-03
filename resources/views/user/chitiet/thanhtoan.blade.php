@extends('layout')
@section('content')


<style>
    body{

    
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


    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <?php 
            $content = Cart::content();
            
        ?>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                    <tr>
                        <!-- Set columns width -->
                        <th class="text-center py-3 px-4" style="min-width: 360px;">Tên sản phẩm &amp; chi tiết</th>
                        <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                        <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                        <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if (isset($content))
                        @foreach ($content as $v_content)
                            <tr>
                                <td class="p-4">
                                <div class="media align-items-center">
                                    <img src="/image/{{$v_content -> options -> image}}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                    <div class="media-body">
                                    <a href="#" class="d-block text-dark">{{$v_content -> name}}</a>
                                    <small>
                                        
                                    </small>
                                    </div>
                                </div>
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4">{{number_format($v_content -> price).'Đ'}}</td>
                                <td class="align-middle p-4">
                                    {{$v_content -> qty}}
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4">
                                    <?php 
                                        $subtotal = $v_content -> price * $v_content -> qty;
                                        echo number_format($subtotal).'Đ';
                                    ?>
                                </td>
                                
                            </tr>
                        @endforeach
                    @else
                        <div>không có sản phẩm</div>
                    @endif
                    
                </tbody>
              </table>


            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="mt-4">
                    
                </div>
                <div class="d-flex">
                    <div class="text-right mt-4">
                        {{-- <label class="text-muted font-weight-normal m-0">Tổng giá</label>
                        <div class="text-large"><strong>{{Cart::total().'Đ'}}</strong></div> --}}
                        <label class="text-muted font-weight-normal m-0">Tổng giá</label>
                        <div class="text-large"><strong>{{Cart::subtotal(0).'Đ'}}</strong></div>
                    </div>
                </div>
            </div>
        
            <div class="float-right">
              {{-- <a href="{{URL::to('/')}}" class="btn btn-lg btn-info md-btn-flat mt-2 mr-3">Tiếp tục mua hàng</a>
              <a href="{{URL::to('login-checkout')}}" class="btn btn-lg btn-primary mt-2">Thanh toán</a> --}}
            </div>
        
        </div>
    </div>

    <div class="card">
      <div class="card-header">
          <h4>Phương thức thanh toán</h4>
      </div>
      <div class="card-body">
          <form action="{{URL::to('/dathang')}}" method="POST">
            @csrf
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="phuongthuctt" value="thanh toán khi nhận hàng">
                  <label class="form-check-label" for="inlineCheckbox1">thanh toán khi nhận hàng</label>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Đặt hàng">
              </div>
          </form>

      </div>
    </div>
</div>


@endsection