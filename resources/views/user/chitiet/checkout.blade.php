@include('user.chitiet.header')

<table>
    <tr >
        <td>
            <!-- Shopping cart table -->
            <div style="margin-left: 40px; width: 686px;" class="card">
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
                                    <th class="text-center py-3 px-4" style="min-width: 250px;">Tên sản phẩm &amp; chi
                                        tiết
                                    </th>
                                    <th class="text-right py-3 px-4" style="width: 80px;">Giá</th>
                                    <th class="text-center py-3 px-1/*-" style="width: 10px;">Số lượng</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($content))
                                    @foreach ($content as $v_content)
                                        <tr>
                                            <td class="p-4">
                                                <div class="media align-items-center">
                                                    <img style="width: 100px; height: 100px;" src="/hinhanh/{{ $v_content->options->image }}"
                                                        class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                    <div class="media-body">
                                                        <a href="#"
                                                            class="d-block text-dark">{{ $v_content->name }}</a>
                                                        <small>

                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                {{ number_format($v_content->price) . 'Đ' }}</td>
                                            <td class="align-middle p-4">
                                                {{ $v_content->qty }}
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal) . 'Đ';
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
                                <div class="text-large"><strong>{{ Cart::subtotal(0) . 'Đ' }}</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="float-right">
                        <a href="{{ URL::to('/') }}" class="btn btn-lg btn-info md-btn-flat mt-2 mr-3">Tiếp tục mua
                            hàng</a>

                    </div>
                    <br>
                </div>
            </div>

        </td>
        <td>

            <div style="width: 800px; margin-top: -30px; margin-left: 0px" class="container px-3 my-5 clearfix">
                <div style="padding: 20px 20px 20px 20px" class="card">
                    <div class="cart-header">
                        <h3>Thông tin vận chuyển</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ URL::to('/save-shipping') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" name="vc_email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Họ tên</label>
                                <input type="text" name="vc_ten" class="form-control" placeholder="họ tên" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Địa chỉ</label>
                                <input type="text" name="vc_diachi" class="form-control" placeholder="địa chỉ"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">điện thoại</label>
                                <input type="text" name="vc_sdt" class="form-control" placeholder="điện thoại"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ghi chú</label>
                                <textarea class="form-control" name="vc_ghichu" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>


        </td>
    </tr>
</table>




@include('user.chitiet.footer')
