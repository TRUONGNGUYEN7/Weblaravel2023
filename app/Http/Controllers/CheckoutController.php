<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function login_checkout($id){
        $dsdanhmucsp = DB::table('tbldanhmucsp')->get();
        $dsthuonghieu = DB::table('tblthuonghieu')->get();
        
        if($id == 0)
        {
            Session::put('message', 'Giỏ hàng hiện chưa có sản phẩm!!!');
            return back();
        }
        else{
            if(Session::get('user_username') != null){
            return view('user.chitiet.checkout')
            ->with('dsdanhmuc', $dsdanhmucsp)
            ->with('dsthuonghieu', $dsthuonghieu);
            } else {
                return redirect::to('/user/showlogin');
            }
        }

    }
    
    public function save_shipping(Request $request){
        $data['diachi']  = $request -> vc_diachi;
        $data['sdt']  = $request -> vc_sdt;
        $data['ten']  = $request -> vc_ten;
        $data['email']  = $request -> vc_email;
        $data['ghichu']  = $request -> vc_ghichu;
        $data['status']  = 1;
        $data['create_at']  = new DateTime('now');

        $shipping_id = DB::table('tblvanchuyen')-> insertGetId($data);
        Session::put('shipping_id', $shipping_id);

        return redirect('/thanhtoan');
    }

    public function thanhtoan(){
        $dsdanhmucsp = DB::table('tbldanhmucsp')->get();
        $dsthuonghieu = DB::table('tblthuonghieu')->get();
       
        return view('user.chitiet.thanhtoan')
        ->with('dsdanhmuc', $dsdanhmucsp)
        ->with('dsthuonghieu', $dsthuonghieu);
    }

    public function dathang(Request $request){
        // return Cart::total(0, ',','');
        $data = array();
        $data['hinhthuc'] = $request -> phuongthuctt;
        $data['status'] = 0;
        $data['create_at'] = new DateTime('now');
        $id_giaodich = DB::table('tblgiaodich') -> insertGetId($data);

        $order_data = array();
        $order_data['IDgiaodich'] = $id_giaodich;
        $order_data['id_vanchuyen'] = Session::get('shipping_id');
        $order_data['id_khachhang'] = Session::get('user_id');
        $order_data['tongtien'] = Cart::total(0, ',','');
        $order_data['status'] = 0;
        $order_data['create_at'] = new DateTime('now');
        $order_id = DB::table('tbldonhang') -> insertGetId($order_data);

        $order_detail_data = array();
        $content = Cart::content();
        foreach($content as $item){
            $order_detail_data['id_donhang'] = $order_id;
            $order_detail_data['masp'] = $item -> id;
            $order_detail_data['tensp'] = $item -> name;
            $order_detail_data['giaban'] = $item -> price;
            $order_detail_data['soluong'] = $item -> qty;
            DB::table('tblchitietdonhang') -> insert($order_detail_data);
        }
        Cart::destroy();

        $dsdanhmucsp = DB::table('tbldanhmucsp')->get();
        $dsthuonghieu = DB::table('tblthuonghieu')->get();
       
   
        return view('user.chitiet.camon')
        ->with('dsdanhmuc', $dsdanhmucsp)
        ->with('dsthuonghieu', $dsthuonghieu);

    }
}
