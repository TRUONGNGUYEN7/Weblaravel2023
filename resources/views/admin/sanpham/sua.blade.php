@extends('admin_layout')
@section('adcontent')
    <div class="panel-body">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
            Session::put('message', null);
        }
        ?>
        <h2>Sản phẩm</h2>
        @foreach ($dssp as $key => $value)
            <form action="{{ URL::to('/admin/sanpham/action_sua/' . $value->idsp) }}" method="POST"
                enctype='multipart/form-data'>
                {{ csrf_field() }}

                <table>

                    <tr>

                        <div class="form-group has-success">
                            <label class="col-lg-3 control-label">Tên sản phẩm</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{ $value->tensp }}" name="tensp" placeholder=""
                                    class="form-control">
                            </div>
                            <br>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-lg-3 control-label">Giá sản phẩm</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{ $value->gia }}" name="giasp" placeholder=""
                                    id="l-name" class="form-control">
                            </div>
                            <br>
                        </div>
                        <div class="form-group has-error">
                            <label class="col-lg-3 control-label">Hình ảnh sản phẩm</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <br>
                        </div>
                        <div class="form-group has-error">
                            <label class="col-lg-3 control-label">Mô tả</label>
                            <div class="col-lg-6">
                                <input type="text" name="motasp" value="{{ $value->motasp }}" placeholder=""
                                    id="l-name" class="form-control">
                            </div>
                            <br>
                        </div>
                        <div class="form-group has-error">
                            <label class="col-lg-3 control-label">Nội dung sản phẩm</label>
                            <div class="col-lg-6">
                                <textarea class="ckeditor form-control" name="mota">{!!$value -> noidungsp!!}</textarea>
                                </textarea>
                            </div>
                            <br>
                        </div>
                        <br>
                        <div class="form-group has-warning">
                            <label class="col-lg-3 control-label">Danh mục sản phẩm</label>
                            <div style="width: 330px;margin-left: 325px" class="form-group row">
                                <select class="form-control" name="iddanhmuc" id="iddanhmuc" class="form-select">
                                    <option value="capnhat" selected>------đang cập nhật------</option>
                                    @foreach ($dsdanhmuc as $key => $item)
                                        @if ($item->iddanhmuc == $value->cateid)
                                            <option selected value="{{ $item->iddanhmuc }}">{{ $item->tendanhmuc }}
                                            </option>
                                        @else
                                            <option value="{{ $item->iddanhmuc }}">{{ $item->tendanhmuc }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group has-warning">
                            <label class="col-lg-3 control-label">Thương hiệu sản phẩm</label>
                            <div style="width: 330px;margin-left: 325px" class="form-group row">
                                <select class="form-control" name="idth" id="idth" class="form-select">
                                    <option value="capnhat" selected>------đang cập nhật------</option>
                                    @foreach ($dsthuonghieu as $key => $item)
                                        @if ($item->idth == $value->thuonghieuid)
                                            <option selected value="{{ $item->idth }}">{{ $item->tenth }}</option>
                                        @else
                                            <option value="{{ $item->idth }}">{{ $item->tenth }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group has-warning">
                            <label class="col-lg-3 control-label">Trạng thái</label>
                            <div style="margin-left: 50px" class="col-lg-6 form-group row">
                                <input type="checkbox" checked name="hienthi" class="switch-btn" data-size="small"
                                    data-color="#0099ff">
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <img style="width:200px; height: 150px;margin: -491px 0px 0px 10px" name="hinhcu" value="$value->hinhanh"
                            src="/hinhanh/{{ $value->hinhanh }}" alt="">
                    </tr>
                </table>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <button type="submit" name="them" class="btn btn-primary">Cập nhật</button>
                    </div>
                    <br>
                </div>
            </form>
        @endforeach
    </div>
@endsection
