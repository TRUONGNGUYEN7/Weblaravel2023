<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail as FacadesMail;
use PHPUnit\Framework\Constraint\Count;
use Mail;

class AdminController extends Controller
{
    public function Authlogin(){
        $admin_username = Session::get('admin_username');
        if($admin_username){
            return Redirect::to('admin') -> send();
        } else {
            return Redirect::to('admin/login') -> send();;
        }
    }

    public function showhome(){
        return view('admin.home');
    }

    public function sendmail()
    {       
        $name = 'Name email';
        Mail::send('email.sendmail',compact('name'), function($email)
        {
            $email->to('truongnguyen777t@gmail.com','WEBLARAVEL');
        });
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function login(){
        return view('admin.login');
    }

    public function home(Request $request){
        $adminname = $request->adminname;
        $adminpass = md5($request->adminpass);

        $result = DB::table('tbladmin')-> where('tenadmin',$adminname)->where('passadmin',$adminpass) ->first();
        if($result) {
            if($result-> status == 0){
                Session::put('message', 'Bạn chưa có quyền đăng nhập!!!');
                return back();
            } else {
                Session::put('admin_username', $result -> tenadmin);
                Session::put('admin_id', $result -> idadmin);
            
                return Redirect::to('/admin');
            }
        } else {
            
            Session::put('message', 'Tài khoản hoặc mật khẩu của bạn không đúng, vui lòng thử lại!!!');
            return Redirect::to('/admin/login');
        }
    }
    public function logout(){

        session() -> flush();
        return redirect('/admin/login');
    }

    //donhang
    public function dsdonhang(){
        // $this -> Authlogin();

        $all_order = DB::table('tbldonhang')
        -> join('tblkhachhang', 'tbldonhang.id_khachhang','=', 'tblkhachhang.IDKH')
        -> select('tbldonhang.*','tblkhachhang.username')
        -> orderBy('tbldonhang.id', 'desc') -> get();
        // return $all_order;
        return view ('admin.donhang.donhang') -> with('all_order', $all_order);
    }

    public function xacnhandonhang($id){
        // $this -> Authlogin();

        DB::table('tbldonhang') -> where('id', $id) -> update(['status'=> 1]);
        $name = 'Nguyễn Nhật Trường';
        Mail::send('email.sendmail',compact('name'), function($email)
        {
            $mailuser = Session::get('user_email');
            $email->subject('Đơn xác nhận');
            $email->to($mailuser,'WEBLARAVEL');
        });
        return back();
    }

    public function chitietdonhang($id){
        // $this -> Authlogin();
        $result = DB::table('tbldonhang') -> where('id', $id) -> get();
        foreach($result as $item){
            $id_vanchuyen = $item -> id_vanchuyen;
            $id_giaodich = $item -> IDgiaodich;
        }

        $ttvanchuyen = DB::table('tblvanchuyen') -> where('IDVC', $id_vanchuyen) -> get();
        $ttthanhtoan = DB::table('tblgiaodich') -> where('ID', $id_giaodich) -> value('hinhthuc');
        $chitietdonhang = DB::table('tblchitietdonhang') -> where('id_donhang', $id) -> get();
        $tonggia = 0;
        foreach($chitietdonhang as $item){
            $tonggia += $item -> giaban * $item -> soluong;
        }

        return view('admin.donhang.chitiet')
            -> with('tonggia', $tonggia)
            -> with('ttvanchuyen', $ttvanchuyen)
            -> with('ttthanhtoan', $ttthanhtoan)
            -> with('chitietdonhang', $chitietdonhang);
    }

    public function indonhang($id){
 
        $result = DB::table('tbldonhang') -> where('id', $id) -> get();
        foreach($result as $item){
            $id_vanchuyen = $item -> id_vanchuyen;
            $id_giaodich = $item -> IDgiaodich;
        }

        $ttvanchuyen = DB::table('tblvanchuyen') -> where('IDVC', $id_vanchuyen) -> get();
        $ttthanhtoan = DB::table('tblgiaodich') -> where('ID', $id_giaodich) -> value('hinhthuc');
        $chitietdonhang = DB::table('tblchitietdonhang') -> where('id_donhang', $id) -> get();
        $tonggia = 0;
        foreach($chitietdonhang as $item){
            $tonggia += $item -> giaban * $item -> soluong;
        }

        $pdf = PDF::loadView('admin.donhang.indonhang', 
        compact('tonggia', 'ttvanchuyen', 'chitietdonhang', 'ttthanhtoan')) 
        -> setPaper([0,0,397,559], 'landscape') ->setOption('Roboto-Black', storage_path('/fonts/Roboto-Black.ttf'));;

        return $pdf -> download('donhang.pdf');
    }
}
