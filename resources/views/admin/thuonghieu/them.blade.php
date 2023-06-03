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
     <form action="{{URL::to('/admin/thuonghieu/action_them')}}" enctype="multipart/form-data" method="POST" class="form-horizontal ">
          {{ csrf_field() }}
          <div class="form-group has-success">
               <label class="col-lg-3 control-label">Tên thương hiệu</label>
               <div class="col-lg-6">
                    <input type="text" name="tenth" placeholder="" id="f-name" class="form-control">
               </div>
          </div>
          <div class="form-group has-error">
               <label class="col-lg-3 control-label">Mô tả</label>
               <div class="col-lg-6">
                    <input type="text" name="motath" placeholder="" id="l-name" class="form-control">
               </div>
          </div>
          <div class="form-group has-error">
               <label class="col-lg-3 control-label">Hình ảnh sản phẩm</label>
               <div class="col-lg-6">
                   <input type="file" class="form-control" name="image" required>
               </div>
           </div>
          <div class="form-group has-warning">
               <label class="col-lg-3 control-label">Trạng thái</label>
               <div class="form-group row">
                    <input type="checkbox" checked name="trangthai" class="switch-btn" data-size="small" data-color="#0099ff">
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