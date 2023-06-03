@include('user.chitiet.header')
<link href="{{ asset('assetuser2/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/fontawesome/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/themify-icons/themify-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/nice-select/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assetuser2/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    body {
        margin-top: 0px;

    }

    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .card {
        box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
    }

    .ui-product-color {
        display: inline-block;
        overflow: hidden;
        margin: .144em;
        width: .875rem;
        height: .875rem;
        border-radius: 10rem;
        -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        vertical-align: middle;
    }
</style>


<!-- Css Styles -->

<div style="width: 1400px;" class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div style="padding: 10px 30px 30px 30px" class="card">
        <div class="card-header">
            <h2>Giỏ hàng</h2>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="warning_mes">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
        </div>
        <?php
        $content = Cart::content();
        $content2 = Cart::count();
        ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <!-- Set columns width -->
                            <th class="text-center py-3 px-4" style="min-width: 200px;">Tên sản phẩm &amp; chi tiết</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                            <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                            <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                    class="shop-tooltip float-none text-light" title=""
                                    data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a>Xóa
                                </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($content))
                            @foreach ($content as $v_content)
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center">
                                            <img style="width: 140px; height: 120px; margin-right: 20px"
                                                src="/hinhanh/{{ $v_content->options->image }}">
                                            {{ $v_content->name }}
                                        </div>
                                    </td>
            </div>
            </td>
            <td class="text-right font-weight-semibold align-middle p-4">{{ number_format($v_content->price) . 'Đ' }}
            </td>
            <td class="align-middle p-">
                <form action="{{ URL::to('update_quantity') }}" method="POST">

                    @csrf

                    <table style="border-style: none; border: none">
                        <tr style="border-style: none; border: none">
                            <td style="border-style: none; border: none">
                                <input style="width: 90px;" type="number" min="1" name="qty"
                                    class="form-control text-center" value="{{ $v_content->qty }}">
                                <input type="hidden" name="rowId" value="{{ $v_content->rowId }}">
                            </td>
                            <td style="border-style: none; border: none">
                                <button type="submit" value="" name="update_qty" class="btn btn-default btn-sm">
                                    <i class="fa fa-refresh" style="font-size:24px"></i>
                                </button>
                            </td>
                        </tr>
                    </table>



                </form>
            </td>
            <td class="text-right font-weight-semibold align-middle p-4">
                <?php
                $subtotal = $v_content->price * $v_content->qty;
                echo number_format($subtotal) . 'Đ';
                ?>
            </td>
            <td class="text-center align-middle px-0">
                <a href="{{ URL::to('/delete_cartitem/' . $v_content->rowId) }}"
                    class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a>
            </td>
            </tr>
            @endforeach
            @endif
            <a>Hiện có {{ $content2 }} sản phẩm</a>

            <input name="nosp" type="hidden" value="{{ number_format($content2) }}">

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
                    <div class="text-large"><strong>{{ Cart::subtotal(0) . 'Đ' }}</strong></div>
                </div>
            </div>
        </div>

        <div style="margin-left: 200px" class="float-right">
            <a href="{{ URL::to('/') }}" class="btn btn-lg btn-info md-btn-flat mt-2 mr-3">Tiếp tục mua hàng</a>

            <a style="margin: 0px 0px" href="{{ URL::to('login-checkout/' . $content2) }}"
                class="btn btn-lg btn-primary mt-2">Thanh
                toán</a>
        </div>

    </div>
</div>
</div>
<br>
@include('user.chitiet.footer')
