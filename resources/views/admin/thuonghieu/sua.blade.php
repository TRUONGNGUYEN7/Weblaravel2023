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
        @foreach ($dsth as $key => $item)
            <form action="{{ URL::to('/admin/thuonghieu/action_sua/' . $item->idth) }}" method="POST"
                enctype="multipart/form-data" class="form-horizontal ">
                {{ csrf_field() }}
                <div class="form-group has-success">
                    <label class="col-lg-3 control-label">Tên danh mục</label>
                    <div class="col-lg-6">
                        <input type="text" value="{{ $item->tenth }}" name="tenth" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="form-group has-error">
                    <label class="col-lg-3 control-label">Mô tả danh mục</label>
                    <div class="col-lg-6">
                        <input type="text" value="{{ $item->motath }}" name="motath" placeholder=""
                            class="form-control">
                    </div>
                </div>
                <div class="form-group has-error">
                    <label class="col-lg-3 control-label">Hình ảnh sản phẩm</label>
                    <div class="col-lg-6">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">Trạng thái</label>
                    <div class="form-group row">
                        @if ($item->trangthaith == 1)
                            <input type="checkbox" checked name="hienthi" class="switch-btn" data-size="small"
                                data-color="#0099ff">
                        @else
                            <input type="checkbox" name="hienthi" class="switch-btn" data-size="small" data-color="#0099ff">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <button type="submit" name="capnhat" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
