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
        <form action="{{ URL::to('/admin/sanpham/action_them') }}" enctype="multipart/form-data" method="POST"
            class="form-horizontal ">
            {{ csrf_field() }}
            <div class="form-group has-success">
                <label class="col-lg-3 control-label">Tên sản phẩm</label>
                <div class="col-lg-6">
                    <input type="text" name="tensp" placeholder="" id="f-name" class="form-control" required>
                </div>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-3 control-label">Giá sản phẩm</label>
                <div class="col-lg-6">
                    <input type="text" name="giasp" placeholder="" id="l-name" class="form-control">
                </div>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-3 control-label">Hình ảnh sản phẩm</label>
                <div class="col-lg-6">
                    <input type="file" class="form-control" name="image" required>
                </div>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-3 control-label">Mô tả</label>
                <div class="col-lg-6">
                    <input type="text" name="motasp" placeholder="" id="l-name" class="form-control">
                </div>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-3 control-label">Nội dung sản phẩm</label>
                <div class="col-lg-6">
                    <textarea type="text" name="noidungsp" placeholder="" id="ckeditor" class="form-control">
                    </textarea>
                </div>
            </div>
            <div class="form-group has-warning">
                <label class="col-lg-3 control-label">Danh mục sản phẩm</label>
                <div style="width: 330px;margin-left: 330px" class="form-group row">
                    <select class="form-control" name="iddanhmuc" id="iddanhmuc" class="form-select">
                        <option value="capnhat" selected>------đang cập nhật------</option>
                        @foreach ($dsdanhmuc as $key => $item)
                            <option value="{{ $item->iddanhmuc }}">{{ $item->tendanhmuc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group has-warning">
                <label class="col-lg-3 control-label">Thương hiệu sản phẩm</label>
                <div style="width: 330px;margin-left: 330px" class="form-group row">
                    <select class="form-control" name="idth" id="idth" class="form-select">
                        <option value="capnhat" selected>------đang cập nhật------</option>
                        @foreach ($dsthuonghieu as $key => $item)
                            <option value="{{ $item->idth }}">{{ $item->tenth }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group has-warning">
                <label class="col-lg-3 control-label">Trạng thái</label>
                <div class="form-group row">
                    <input type="checkbox" checked name="hienthi" class="switch-btn" data-size="small" data-color="#0099ff">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                    <button type="submit" name="them" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
@endsection
