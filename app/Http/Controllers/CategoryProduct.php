<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function Authlogin()
    {
        $admin_username = Session::get('admin_username');
        if (!$admin_username) {
            return Redirect::to('admin/login')->send();
        }
    }
    
    public function hienthi()
    {
        $this->Authlogin();
        $dsdanhmucsp = DB::table('tbldanhmucsp')->get();
        $dsthuonghieu = DB::table('tblthuonghieu')->get();
        return view('admin.danhmucsp.lietke')->with('dsdanhmucsp', $dsdanhmucsp)
        ->with('dsthuonghieu', $dsthuonghieu);
    }
    public function them()
    {
        return view('admin.danhmucsp.them');
    }
    public function action_them(Request $request)
    {
        $data = array();
        $data['tendanhmuc'] = $request->tendanhmuc;
        $data['mota'] = $request->mota;
        $status = $request->hienthi;
        if ($status == 'on') {
            $data['trangthai'] = 1;
        } else {
            $data['trangthai'] = 0;
        }
        $result = DB::table('tbldanhmucsp')->where('tendanhmuc', $request->tendanhmuc)->first();
        if ($result) {
            Session::put('message', 'Đã tồn tại!!!');
            return back();
        } else if ($request->tendanhmuc == null) {
            Session::put('message', 'Các trường không được để trống!!!');
            return back();
        } else {
            DB::table('tbldanhmucsp')->insert($data);
            Session::put('message', 'Thêm thành công');
            return back();
        }
    }

     //POST
     public function action_sua(Request $request, $id){
        $data = array();
        $data['tendanhmuc'] = $request -> tendanhmuc;
        $data['mota'] = $request -> mota;
        $trangthai = $request -> hienthi;
        if($trangthai == 'on'){
            $data['trangthai'] = 1;
        }
        else{
            $data['trangthai'] = 0;
        }
        
        if($request -> tendanhmuc == ''){
            Session::put('message', 'Tên không được để trống!!!');
            return back();
        }
        else{
            DB::table('tbldanhmucsp') -> where('iddanhmuc', $id) -> update($data);
            Session::put('message', 'Cập nhật thành công');
            return redirect('admin/danhmucsp/hienthi');
        }
    }

    public function suadm($id){
        $this -> Authlogin();

        $dsdanhmucsp = DB::table('tbldanhmucsp') -> where('iddanhmuc', $id) -> get();
        return view('admin.danhmucsp.sua') -> with('dsdanhmucsp', $dsdanhmucsp);
    }

    public function xoadm($id){
        $this -> Authlogin();

        DB::table('tbldanhmucsp') -> where('iddanhmuc', $id) -> delete();
        return back();
    }  

    public function hidden($id){
        $this -> Authlogin();

        DB::table('tbldanhmucsp') -> where('iddanhmuc', $id) -> update(['trangthai'=> 0]);
        return redirect::to('admin/danhmucsp/hienthi');
    }

    public function show($id){
        $this -> Authlogin();

        DB::table('tbldanhmucsp') -> where('iddanhmuc', $id) -> update(['trangthai'=> 1]);
        return redirect::to('admin/danhmucsp/hienthi');
    }
    public function show_cate_home($cateid)
    {
        $dsdanhmuc = DB::table('tbldanhmucsp') -> where('trangthai', 1) -> get();
        $dsspbydanhmuc = DB::table('tblsanpham') -> where('cateid', $cateid) -> get();
        $dsthuonghieu = DB::table('tblthuonghieu') -> where('trangthaith', 1) -> get();
        return view('user.chitiet.danhmuc') -> with('dsspbydanhmuc', $dsspbydanhmuc) 
        -> with('dsdanhmuc', $dsdanhmuc)
        -> with('dsthuonghieu', $dsthuonghieu);
    }
    public function show_th_home($thid)
    {
        $dsthuonghieu = DB::table('tblthuonghieu') -> where('trangthaith', 1) -> get();
        $dsspbythuonghieu = DB::table('tblsanpham') -> where('thuonghieuid', $thid) -> get();
        $dsdanhmuc = DB::table('tbldanhmucsp') -> where('trangthai', 1) -> get();
        return view('user.thuonghieu') -> with('dsspbythuonghieu', $dsspbythuonghieu) 
        -> with('dsthuonghieu', $dsthuonghieu)
        -> with('dsdanhmuc', $dsdanhmuc) ;   
    }

    public function chitietsp($idsp) {
        $ttsp = DB::table('tblsanpham') -> where('idsp', $idsp) -> get();
        foreach($ttsp as $item){
            $cateid = $item->cateid;
            $thuonghieuid = $item->thuonghieuid;
        }
        $dmchon = DB::table('tbldanhmucsp') -> where('iddanhmuc', $cateid) -> get();
        $thchon = DB::table('tblthuonghieu') -> where('idth', $thuonghieuid) -> get();

        $dsdanhmuc   = DB::table('tbldanhmucsp') -> get();
        $dsthuonghieu = DB::table('tblthuonghieu') -> get();
        // $dsbinhluan = DB::table('tblbinhluan')
        // -> join('tblkhachhang', 'tblkhachhang.IDKH', '=', 'tblbinhluan.id_khachhang') 
        // -> where('tblbinhluan.status', 1) -> select('tblbinhluan.id', 'tblkhachhang.Avatar', 'tblkhachhang.username', 'tblbinhluan.create_at', 'tblbinhluan.noidung') -> get();
        // return dd($dsbinhluan); 
        // Share button 1
        $shareButtons1 = \Share::page(
            'https://fptshop.com.vn/dien-thoai/samsung-galaxy-s23-ultra'        
      )   
      ->facebook()
      ->twitter()
      ->linkedin()
      ->telegram()
      ->whatsapp() 
      ->reddit();
          
      $dsbinhluan = DB::table('tblbinhluan')
      -> join('tblkhachhang', 'tblkhachhang.IDKH', '=', 'tblbinhluan.id_khachhang') 
      -> where('tblbinhluan.status', 1)-> where('tblbinhluan.id_sp', $idsp) -> get();

        return view('user.chitiet.chitietsp') 
            -> with('ttsanpham', $ttsp)
            -> with('dsdanhmuc', $dsdanhmuc)
            -> with('dsthuonghieu', $dsthuonghieu)
            -> with('dmchon', $dmchon) ->with('shareButtons1',$shareButtons1 )
            -> with('thchon', $thchon)
            -> with('dsbinhluan', $dsbinhluan);
            // -> with('dsbinhluan', $dsbinhluan); 
    }
}
