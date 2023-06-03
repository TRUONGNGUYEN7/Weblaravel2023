<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(Request $request){
        $dsthuonghieu = DB::table('tblthuonghieu') -> get();
        $dsdanhmuc = DB::table('tbldanhmucsp') -> get();
        $dssp = DB::table('tblsanpham') -> where('status', 1) -> paginate(20);
        Session::put('nosp', $request -> nosp);
        
        return view('user.chitiet.giohang')
        -> with('dsthuonghieu', $dsthuonghieu)
        -> with('dssp', $dssp)
        -> with('dsdanhmuc', $dsdanhmuc);
    }

    public static function save_cart(Request $request){
        $idsp = $request -> idsp;
        $soluong = $request -> soluong;
        $product_info = DB::table('tblsanpham') -> where('idsp', $idsp) -> first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        $data['id']                 = $product_info -> idsp;
        $data['qty']                = $soluong;
        $data['name']               = $product_info -> tensp;
        $data['price']              = $product_info -> gia;
        $data['weight']             = $product_info -> giamgia;
        $data['options']['image']    = $product_info -> hinhanh;

        Cart::add($data);
        Cart::setGlobalTax(0);
        // Cart::Destroy();
        return Redirect::to('/shopping_cart');
    }

    public function delete_cartitem($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/shopping_cart');
    }

    public function update_quantity(Request $request){
        $rowId = $request -> rowId;
        $qty = $request -> qty;
        Cart::update($rowId, $qty);
        return Redirect::to('/shopping_cart');
    }
}
