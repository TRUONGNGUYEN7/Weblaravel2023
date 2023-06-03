<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 13px;
        }
        h3{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <h3  class="text-center">BILL</h3>
    <div class="container">
        <div class="row">
            <table style="border: none; width: 100%;">
                @foreach ($ttvanchuyen as $value)
                    
                <tr>
                    <td>Tên khách hàng: <span>{{$value -> ten}}</span></td>
                    <td>Email: {{$value -> email}}</td>
                </tr>
                <tr>
                    <td>Số điện thoại: {{$value -> sdt}}</td>
                    <td>Địa chỉ: {{$value -> diachi}}</td>
                </tr>
                <tr>
                    <td><div>Ghi chú: {{$value -> ghichu}}</div></td>
                    <td><div>Hình thức thanh toán: {{$ttthanhtoan}}</div></td>
                </tr>
                @endforeach
            </table>
            <a style="margin-left: 170px;color: black; font-size: 19px" class="text-center">Danh Sách Sản Phẩm</a>
            <table id="tblhe" class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th  class="table-plus">ID</th>
                        <th class="datatable-nosort">Mã sách</th>
                        <th class="datatable-nosort">Tên sách</th>                        
                        <th class="datatable-nosort">Giá</th>                        
                        <th class="datatable-nosort">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chitietdonhang as $key => $item)    
                        <tr>
                            <td class="table-plus">{{$item -> id}}</td>
                            <td>{{$item -> masp}}</td>
                            <td>{{$item -> tensp}}</td>
                            <td>{{number_format($item -> giaban)}}</td>
                            <td>{{$item -> soluong}}</td>
                            
                        </tr>
                    @endforeach
                    <tr >
                        <td colspan="5" >
                            <h5>Tổng giá : <?php echo number_format($tonggia)?> vnd</h5> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>