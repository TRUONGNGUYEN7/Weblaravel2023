<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index( Request $request)
    {
      if(isset($_GET['sort_by'])){
        $sort_by = $_GET['sort_by'];
        //return $sort_by;
        $dsdanhmuc = DB::table('tbldanhmucsp')->where('trangthai', 1) -> get();
        $dsthuonghieu=DB::table('tblthuonghieu')->where('trangthaith',1)->get();
        if($sort_by=='tang_dan')
        {
          $dssptang = DB::table('tblsanpham') -> where('status', 1) ->orderBy('gia','asc') -> paginate(6);
          return view('pages.home')        
          -> with('dsdanhmuc', $dsdanhmuc) 
          -> with('dsthuonghieu', $dsthuonghieu) 
          -> with('dssp', $dssptang) ;
        }else
        if($sort_by=='giam_dan')
        {
          $dsspgiam = DB::table('tblsanpham') -> where('status', 1) ->orderBy('gia','desc') -> paginate(6);
          return view('pages.home')        
          -> with('dsdanhmuc', $dsdanhmuc) 
          -> with('dsthuonghieu', $dsthuonghieu) 
          -> with('dssp', $dsspgiam) ;
        }else
        if($sort_by=='none')
        {
          $dssp = DB::table('tblsanpham') -> where('status', 1) -> paginate(6);
          return view('pages.home')        
          -> with('dsdanhmuc', $dsdanhmuc) 
          -> with('dsthuonghieu', $dsthuonghieu) 
          -> with('dssp', $dssp) ;
        }
      }
      else
      {
        if(isset($request -> keyword)){
          $dsdanhmuc = DB::table('tbldanhmucsp') -> where('trangthai', 1) -> get();
          $dsthuonghieu = DB::table('tblthuonghieu') -> where('trangthaith', 1) -> get();
          $dssp = DB::table('tblsanpham') 
              -> where('tensp', 'LIKE', '%'.$request -> keyword.'%') 
              -> where('status', 1) -> paginate(6);
          $dsspko = DB::table('tblsanpham') 
          -> where('status', 1) -> paginate(6);
          // $dssp = appends($request -> all());
          if(isset($dssp))
          {
            return view('pages.home') 
              -> with('dsdanhmuc', $dsdanhmuc) 
              -> with('dsthuonghieu', $dsthuonghieu) 
              -> with('dssp', $dssp) ;
          }
          else
          {
            return view('pages.home') 
            -> with('dsdanhmuc', $dsdanhmuc) 
            -> with('dsthuonghieu', $dsthuonghieu) 
            -> with('dssp', $dsspko) ;
          }    
        } 
        else 
        {
          $dsdanhmuc = DB::table('tbldanhmucsp')->where('trangthai','1') -> get();
          $dsthuonghieu = DB::table('tblthuonghieu')->where('trangthaith','1') -> get();
  
          $dssp = DB::table('tblsanpham') -> where('status', 1) -> paginate(6);
          return view('pages.home',compact('dssp'))  
          -> with('dsdanhmuc', $dsdanhmuc)
            -> with('dssp', $dssp) 
          -> with('dsthuonghieu', $dsthuonghieu);
        }
      }
     
    }
}
