@extends('layout')
@section('content')
    <!-- Start Filter Bar -->
    <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="sorting">
            <form>
                @csrf
                <select name="sort" id="sort" class="form-control">
                    <option value="{{ Request::url() }}?sort_by=none">--Sắp xếp--</option>
                    <option value="{{ Request::url() }}?sort_by=tang_dan">Giá tăng dần</option>
                    <option value="{{ Request::url() }}?sort_by=giam_dan">Giá giảm dần</option>
                </select>
            </form>
        </div>
        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2339123679735877&autoLogAppEvents=1">
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sort').on('change', function() {
                    var url = $(this).val();
                    if (url) {
                        window.location = url;
                    }
                    return false;
                });
            });
        </script>

        <div>
            <div class="input-group filter-bar-search">
                <form action="{{ URL::to('/') }}" method="GET">
                    <input type="text" name="keyword" placeholder="Tìm kiếm">

                    <button style="border-radius: ; height: 35px;width: 34px;" type="submit"><i
                            class="ti-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Filter Bar -->
    <!-- Start Best Seller -->


    <section class="lattest-product-area pb-40 category-list">
        <div class="row">
            @foreach ($dssp as $key => $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img style="width: 200px; height: 175px;" class="card-img" src="hinhanh/{{ $item->hinhanh }}"
                                alt="">
                            <ul class="card-product__imgOverlay">

                                <li>
                                    <form action="{{ URL::to('/save_cart') }}" method="POST" class="product-count">
                                        @csrf
                                        <input type="hidden" name="idsp" value="{{ $item->idsp }}">
                                        <input type="hidden" name="soluong" value="1" class="qty">
                                        <button type="submit"><i class="ti-shopping-cart"></i></button>
                                    </form>
                                </li>



                                <li><button><i class="ti-heart"></i></button></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Chính hãng</p>
                            <h4 style="font-size: 19px; font-family:serif; font-color: blue" class="card-product__title"><a
                                    href="{{ URL::to('/chi-tiet-san-pham/' . $item->idsp) }}">{{ $item->tensp }}</a></h4>
                            <p class="card-product__price">${{ $item->gia }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin-left: 40%">
            {!! $dssp->links() !!}
        </div>
    </section>
    <!-- End Best Seller -->
@endsection
