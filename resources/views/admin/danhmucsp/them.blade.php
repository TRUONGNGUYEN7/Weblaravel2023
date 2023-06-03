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
        <form action="{{ URL::to('/admin/danhmucsp/action_them') }}" method="POST" class="form-horizontal ">
            {{ csrf_field() }}
            <div class="form-group has-success">
                <label class="col-lg-3 control-label">Tên danh mục</label>
                <div class="col-lg-6">
                    <input type="text" name="tendanhmuc" required minlength="5" placeholder="" id="f-name" class="form-control">
                </div>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-3 control-label">Mô tả danh mục</label>
                <div class="col-lg-6">
                    <input type="text" name="mota" required placeholder="" id="mota"
                        class="form-control">
                </div>
            </div>
            <script>
                const email = document.getElementById("mota");

                email.addEventListener("input", (event) => {
                    if (email.validity.typeMismatch) {
                        email.setCustomValidity("Điền địa chỉ email!");
                    } else {
                        email.setCustomValidity("");
                    }
                });
            </script>
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
