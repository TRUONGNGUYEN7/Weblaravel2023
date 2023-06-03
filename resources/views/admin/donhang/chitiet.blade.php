@extends('admin_layout')
@section('adcontent')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">

                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Quản lý</a></li>
                        <li class="breadcrumb-item" aria-current="page">Danh mục đơn</li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                THÔNG TIN VẬN CHUYỂN
            </div>

        </div>
        <div class="pd-20">
            @foreach ($ttvanchuyen as $item)
                <div class="form-group row">
                    <div class="col-sm-4">Tên khách hàng: </div>
                    <div class="col-sm-8">{{ $item->ten }}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">Email: </div>
                    <div class="col-sm-8"> {{ $item->email }}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">Địa chỉ: </div>
                    <div class="col-sm-8">{{ $item->diachi }}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">Số điện thoại: </div>
                    <div class="col-sm-8">{{ $item->sdt }}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">ghichu: </div>
                    <div class="col-sm-8">
                        <span></span>
                    </div>
                </div>
            @endforeach
            <div class="form-group row">
                <div class="col-sm-4">Phương thức thanh toán: </div>
                <div class="col-sm-8">{{ $ttthanhtoan }}</div>
            </div>
        </div>
    </div>


    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">DANH SÁCH DANH MỤC SẢN PHẨM</h4>

            <div class="pull-right">

            </div>
        </div>
        <div class="pb-20">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Responsive Table
                    </div>
                    <div class="row w3-res-tb">
                        <div class="col-sm-5 m-b-xs">
                            <select class="input-sm form-control w-sm inline v-middle">
                                <option value="0">Bulk action</option>
                                <option value="1">Delete selected</option>
                                <option value="2">Bulk edit</option>
                                <option value="3">Export</option>
                            </select>
                            <button class="btn btn-sm btn-default">Apply</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" class="input-sm form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th class="table-plus">ID</th>
                                    <th class="datatable-nosort">Mã sản phẩm</th>
                                    <th class="datatable-nosort">Tên sản phẩm</th>
                                    <th class="datatable-nosort">Giá</th>
                                    <th class="datatable-nosort">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chitietdonhang as $key => $item)
                                    <tr>
                                        <td class="table-plus">{{ $item->id }}</td>
                                        <td>{{ $item->masp }}</td>
                                        <td>{{ $item->tensp }}</td>
                                        <td>{{ number_format($item->giaban) }} Đ</td>
                                        <td>{{ $item->soluong }}</td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <h5>tổng giá : <?php echo number_format($tonggia); ?> Đ</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">

                            <div class="col-sm-5 text-center">
                                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                            </div>
                            <div class="col-sm-7 text-right text-center-xs">
                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                    <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">4</a></li>
                                    <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="pagination-block">

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Bạn chắc chắn muốn xóa?",
                text: "Nếu như xóa, dữ liệu sẽ không thể khôi phục",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
