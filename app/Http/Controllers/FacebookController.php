<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function index(){

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

       

        // Load index view
        return view('user.chitiet.face')
              ->with('shareButtons1',$shareButtons1 );
  }
}
