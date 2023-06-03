<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Brand;
class ThuonghieuController extends Controller
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
        // $dsth = Brand::all();
        $dsth = Brand::orderBy('idth','desc')->take(6)->get();
        // $dsth = DB::table('tblthuonghieu')->get();
        return view('admin.thuonghieu.lietke')->with('dsth', $dsth);
    }
    public function them()
    {
        return view('admin.thuonghieu.them');
    }
    public function action_them(Request $request)
    {
        $data = $request->all();
        $brand = new Brand();
        $brand->tenth = $data['tenth'];
        $brand->motath = $data['motath'];
   
        $trangthai = $request->trangthai;
        if ($trangthai == 'on') {
            $brand->trangthaith = 1;
        } else {
            $brand->trangthaith = 0;
        }
        if($request -> file('image')){
            $file= $request -> file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            
            $file-> move(public_path('hinhanh'), $filename);
            $brand->hinhanh = $filename;
        }
        if ($request->tenth == null) {
            Session::put('message', 'Các trường không được để trống!!!');
            return back();
        } else {
            $brand->save();            
            Session::put('message', 'Thêm thành công');
            return view('admin.thuonghieu.lietke');
        }
        // $data = array();
        // $data['tenth'] = $request->tenth;
        // $data['motath'] = $request->motath;
        // $trangthai = $request->hienthi;
        // if ($trangthai == 'on') {
        //     $data['trangthaith'] = 1;
        // } else {
        //     $data['trangthaith'] = 0;
        // }
        // $result = DB::table('tblthuonghieu')->where('tenth', $request->tenth)->first();
        // if ($result) {
        //     Session::put('message', 'Đã tồn tại!!!');
        //     return back();
        // } else if ($request->tenth == null) {
        //     Session::put('message', 'Các trường không được để trống!!!');
        //     return back();
        // } else {
        //     DB::table('tblthuonghieu')->insert($data);
        //     Session::put('message', 'Thêm thành công');
        //     return back();
        // }
    
    }

    //POST
    public function action_sua(Request $request, $id){

        $data = $request->all();

        $trangthai = $request->hienthi;
        if ($trangthai == 'on') {
            $trangthaith = 1;
        } else {
            $trangthaith = 0;
        }
        $tenth = $data['tenth'];
        $motath = $data['motath'];
             
        if($request -> file('image')){
            $file= $request -> file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            
            $file-> move(public_path('hinhanh'), $filename);
            $hinhanh = $filename;
        }
        else
        {
            $hinhanh = null;
        }



        if($request -> tenth == ''){
            Session::put('message', 'Tên không được để trống!!!');
            return back();
        }
        else{
            Brand::where('idth', '=', $id)->update([
                'tenth' => $tenth,
                'motath' => $motath,
                'trangthaith' => $trangthaith ,
                'hinhanh' => $hinhanh],
            );
            Session::put('message', 'Cập nhật thành công');
            return redirect('admin/thuonghieu/hienthi');
        }

        // $data = array();
        // $data['tenth'] = $request -> tenth;
        // $data['motath'] = $request -> motath;
        // $trangthai = $request -> hienthi;
        // if($trangthai == 'on'){
        //     $data['trangthaith'] = 1;
        // }
        // else{
        //     $data['trangthaith'] = 0;
        // }
        
        // if($request -> tenth == ''){
        //     Session::put('message', 'Tên không được để trống!!!');
        //     return back();
        // }
        // else{
        //     DB::table('tblthuonghieu') -> where('idth', $id) -> update($data);
        //     Session::put('message', 'Cập nhật thành công');
        //     return back();
        // }
    }

    public function suath($id){
        $this -> Authlogin();

        $dsth = Brand::where('idth', $id) -> get();
        return view('admin.thuonghieu.sua') -> with('dsth', $dsth);
    }

    public function xoath($id){
        $this -> Authlogin();

        DB::table('tblthuonghieu') -> where('idth', $id) -> delete();
        return back();
    }  

    public function hidden($id){
        $this -> Authlogin();

        DB::table('tblthuonghieu') -> where('idth', $id) -> update(['trangthaith'=> 0]);
        return redirect::to('admin/thuonghieu/hienthi');
    }

    public function show($id){
        $this -> Authlogin();

        DB::table('tblthuonghieu') -> where('idth', $id) -> update(['trangthaith'=> 1]);
        return redirect::to('admin/thuonghieu/hienthi');
    }
}
