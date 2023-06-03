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
                        <li class="breadcrumb-item" aria-current="page">Thương hiệu</li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
               </nav>
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
                                        <th style="width: 30px;">ID</th>
                                        <th style="width: 100px;">Tên danh mục</th>
                                        <th style="width: 100px;">Mô tả</th>
                                        <th style="width: 30px;">Trạng thái</th>
                                        <th style="width: 40px;">Thao tác</th>

                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach ($dsth as $key => $item)
                                   <tr>
                                        <td class="table-plus">{{$item -> idth}}</td>
                                        <td>{{$item -> tenth}}</td>
                                        <td class="table-plus">{{$item -> motath}}</td>
                                        <td>
                                             <div style="width: 30px;">
                                                  @if ($item -> trangthaith == 1)
                                                  <a href="{{URL::to('/admin/thuonghieu/hiden/'.$item -> idth)}}">
                                                       <input type="checkbox" checked name="hienthi" class="switch-btn" data-size="small" data-color="#0099ff">
                                                  </a>
                                                  @else
                                                  <a href="{{URL::to('/admin/thuonghieu/show/'.$item -> idth)}}">
                                                       <input type="checkbox" name="hienthi" class="switch-btn" data-size="small" data-color="#0099ff">
                                                  </a>
                                                  @endif
                                             </div>

                                        </td>

                                        <td>
                                             <table>
                                                  <tr>
                                                       <td>
                                                            <a href="{{URL::to('admin/thuonghieu/sua/'.$item -> idth)}}"><i class="dw dw-edit"></i> Edit</a>

                                                       </td>
                                                       <td>
                                                            <form action="{{URL::to('/admin/thuonghieu/xoa/'.$item -> idth)}}" method="POST">
                                                                 @csrf
                                                                 <button type="submit" class="show-alert-delete-box" data-toggle="tooltip" title='Delete'><i class="dw dw-delete-3"></i>Delete</button>
                                                            </form>
                                                       </td>
                                                  </tr>
                                             </table>



                                        </td>
                                   </tr>
                                   @endforeach
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