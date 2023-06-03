<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function Authlogin()
    {
        $admin_username = Session::get('admin_username');
        if (!$admin_username) {
            return Redirect::to('admin/login')->send();
        }
    }

    public function hienthi(){
        $this -> Authlogin();
        
        $dssp = DB::table('tblsanpham') 
        -> join('tbldanhmucsp' , 'tbldanhmucsp.iddanhmuc', '=', 'tblsanpham.cateid')
        ->join('tblthuonghieu' , 'tblthuonghieu.idth', '=', 'tblsanpham.thuonghieuid') -> get();
        return view('admin.sanpham.lietke') -> with('dssp', $dssp);
    }
    public function them()
    {
        $this -> Authlogin();

        $dsdanhmuc = DB::table('tbldanhmucsp') -> get();
        $dsthuonghieu = DB::table('tblthuonghieu') -> get();

        return view('admin.sanpham.them')
        -> with('dsdanhmuc', $dsdanhmuc)
        -> with('dsthuonghieu', $dsthuonghieu);

    }
    public function action_them(Request $request){
        $this -> Authlogin();

        $data = array();
        $data['tensp'] = $request -> tensp;
        $data['cateid'] = $request -> iddanhmuc;
        $data['thuonghieuid'] = $request -> idth;
        $data['gia'] = $request -> giasp;
        $data['motasp'] = $request -> motasp;
        $data['noidungsp'] = $request -> noidungsp;
        $data['status'] = $request -> hienthi;
        $data['giamgia'] = 0;
        $status = $request -> hienthi;
        if($status == 'on'){
            $data['status'] = 1;
        }
        else{
            $data['status'] = 0;
        }

        if($request -> file('image')){
            $file= $request -> file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            
            $file-> move(public_path('hinhanh'), $filename);
            $data['hinhanh']= $filename;
        }

        $check = DB::table('tblsanpham') -> where('tensp', $request -> tensp) -> where('thuonghieuid', $request -> idth) -> first();
        if($check){
            Session::put('message', 'Đã tồn tại!!!');
            return back();
        } else if($request -> tensp == "") {
            Session::put('message', 'Các trường chưa được nhập đầy đủ!!!');
            return back();
        } else if($request -> file('image') == null){
            Session::put('message', 'Thêm hình ảnh sản phẩm!!!');
            return back();
        } else {
            DB::table('tblsanpham') -> insert($data);
            Session::put('message', 'Thêm thành công');
            return back();
        }
    }


    //POST
    public function action_sua(Request $request, $id){
        $data = array();
        $data['tensp'] = $request -> tensp;
        $data['motasp'] = $request -> motasp;
        $status = $request -> hienthi;
        if($status == 'on'){
            $data['status'] = 1;
        }
        else{
            $data['status'] = 0;
        }

        if($request -> file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('hinhanh'), $filename);
            
            $image_name = 'demo.png';
            $image_path = public_path('products/images/'.$image_name);
            if(File::exists($image_path)) {
              File::delete($image_path);
            }

            $data['hinhanh']= $filename;
        } else {
            $data['hinhanh'] = $request -> image;
        }

        if($request -> tensp == ''){
            Session::put('message', 'Tên không được để trống!!!');
            return back();
        }
        else{
            DB::table('tblsanpham') -> where('idsp', $id) -> update($data);
            Session::put('message', 'Cập nhật thành công');
            return redirect('admin/sanpham/hienthi');
        }
    }

    public function sua($id){
        $this -> Authlogin();

        $dssp = DB::table('tblsanpham') -> where('idsp', $id) -> get();
        $dsdanhmuc = DB::table('tbldanhmucsp') -> get();
        $dsthuonghieu = DB::table('tblthuonghieu') -> get();
        return view('admin.sanpham.sua') -> with('dssp', $dssp)
            -> with('dsdanhmuc', $dsdanhmuc)
            -> with('dsthuonghieu', $dsthuonghieu);
    }

    public function xoa($id){
        $this -> Authlogin();

        DB::table('tblsanpham') -> where('idsp', $id) -> delete();
        return back();
    }  

    public function hidden($id){
        $this -> Authlogin();

        DB::table('tblsanpham') -> where('idsp', $id) -> update(['status'=> 0]);
        return redirect::to('admin/sanpham/hienthi');
    }

    public function show($id){
        $this -> Authlogin();

        DB::table('tblsanpham') -> where('idsp', $id) -> update(['status'=> 1]);
        return redirect::to('admin/sanpham/hienthi');
    }
}
