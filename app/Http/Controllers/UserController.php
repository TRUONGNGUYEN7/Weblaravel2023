<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Socialite;

class UserController extends Controller
{
    

    public function them_binhluan(Request $request, $idsp){
            if(Session::get('user_id')){
                $id_khachhang = Session::get('user_id');
                $noidung = $request-> noidung;
                $data = array();
                $data['id_khachhang'] = $id_khachhang;
                $data['id_sp'] = $idsp;
                $data['noidung'] = $noidung;
                $data['status'] = 1;
                $data['created_at'] = new dateTime('now');
                // return dd($data);
                DB::table('tblbinhluan') -> insert($data);
               return back();
            } else {
                return redirect::to('/user/showlogin');
            }

    }
    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function CallbackGoogle() {
        // return dd(1);
        
            $google_user = Socialite::driver('google')->user();
            // return dd($google_user);
            $user = DB::table('tblkhachhang') -> Where('id_google', $google_user -> getId()) -> first();
          
            if($user){
                // return dd('1');  
                Session::put('user_username', $user -> username);
                Session::put('user_email', $user -> email);
                if(isset($user -> Avatar)){
                    Session::put('avatargoogle', $user -> Avatar);
                }
                Session::put('user_id', $user -> IDKH);
                $preUrl = Session::get('url');
                return Redirect::to($preUrl);
                
            } else {
                $data = array();
                $data['id_google'] = $google_user -> getId();
                $data['username'] = $google_user -> getName();
                $data['password']   = md5($google_user -> getId());
                $data['email']      = $google_user -> getEmail();
                $data['Avatar']      = $google_user -> getAvatar();
                $data['status']     = 1;
                $data['create_at']  = new dateTime('now');
                DB::table('tblkhachhang') -> insert($data);
                // return dd($result);
                $result = DB::table('tblkhachhang') -> where('id_google', $google_user -> getId()) -> first();
                //return dd($result);
                $google_user = Socialite::driver('google')->user();
                $namegoogle = $google_user -> name; 
                $avgoogle = $google_user -> getAvatar(); 
                Session::put('user_username', $namegoogle);
                Session::put('avatargoogle', $avgoogle);
                Session::put('user_email', $result -> email);
                if(isset($result -> avatar)){
                    Session::put('avatar', $result -> avatar);
                }
                Session::put('user_id', $result -> IDKH);

                $preUrl = Session::get('url');
                return Redirect::to($preUrl);
            }
        
           
            return Redirect::to('/');
        
    }

    public function login(){
        Session::forget('url');
        $url = url()->previous();
        Session::put('url', $url);
        // return dd($url);
        $login = "login";
        return view('user/loginuser') -> with('login', $login);
    }

    public function user_login(Request $request){
        $tenuser = $request->tenuser;
        $pass = md5($request->passuser);

        $result = DB::table('tbluser')-> where('email',$tenuser)->where('passuser',$pass) ->first();
        if($result) {
            if($result-> status == 0){
                Session::put('message', 'Bạn chưa có quyền đăng nhập!!!');
                return back();
            } else {
                Session::put('user_username', $result -> tenuser);
                Session::put('user_id', $result -> iduser);
            
                $preUrl = Session::get('url');
                return Redirect::to($preUrl);
            }
        } else {
            
     
            Session::put('message', 'Tài khoản hoặc mật khẩu của bạn không đúng, vui lòng thử lại!!!');
           return redirect('/user/showlogin');
        }
    }
    public function logout(){

        session() -> flush();
        return redirect('/');
    }
}
