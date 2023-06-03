<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\categoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThuonghieuController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Homecontroller::class, 'index']);

Route::get('/face', [FacebookController::class, 'index']);
Route::get('/trangchu', [homecontroller::class, 'index']);

//admin
Route::get('/admin', [admincontroller::class, 'showhome']);
Route::get('/admin/login', [admincontroller::class, 'login']);
Route::post('/admin/login', [admincontroller::class, 'home']);
Route::get('/admin/logout', [adminController::class, 'logout']);

Route::get('admin/donhang', [adminController::class, 'dsdonhang']);
Route::get('/admin/donhang/xacnhan/{id}', [adminController::class, 'xacnhandonhang']);
Route::get('/admin/donhang/chitiet/{id}', [adminController::class, 'chitietdonhang']);
Route::get('/admin/donhang/indonhang/{id}', [adminController::class, 'indonhang']);

//mail
Route::get('/send-email', [adminController::class, 'sendmail']);

//users
Route::get('/user/showlogin', [UserController::class, 'login']);
Route::post('/user/login', [UserController::class, 'user_login']);
Route::get('/user/logout', [UserController::class, 'logout']);
Route::get('admin/loai/create', 'Backend\LoaiController@create')->name('admin.loai.create');
//admin/sanpham

Route::get('/admin/danhmucsp/hienthi', [categoryProduct::class, 'hienthi'])->name('admin.lk');
Route::get('/admin/danhmucsp/them', [categoryProduct::class, 'them']);
Route::post('/admin/danhmucsp/action_them', [categoryProduct::class, 'action_them']);
Route::post('/admin/danhmucsp/action_sua/{idth}', [categoryProduct::class, 'action_sua']);
Route::get('/admin/danhmucsp/sua/{id}', [categoryProduct::class, 'suadm']);
Route::post('/admin/danhmucsp/xoa/{id}', [categoryProduct::class, 'xoadm']);
Route::get('/admin/danhmucsp/hiden/{id}', [categoryProduct::class, 'hidden']);
Route::get('/admin/danhmucsp/show/{id}', [categoryProduct::class, 'show']);
Route::get('/chi-tiet-san-pham/{idsp}', [categoryProduct::class, 'chitietsp']);
Route::post('user/them-binhluan/{idsp}', [usercontroller::class, 'them_binhluan']);
//giohang
Route::get('/shopping_cart', [cartController::class, 'index']);
Route::post('/save_cart', [cartController::class, 'save_cart']);
Route::get('/delete_cartitem/{rowId}', [cartController::class, 'delete_cartitem']);
Route::post('/update_quantity', [cartController::class, 'update_quantity']);

// checkout
Route::get('/login-checkout/{id}', [CheckoutController::class, 'login_checkout']);
Route::post('/save-shipping', [CheckoutController::class, 'save_shipping']);
Route::get('/thanhtoan', [CheckoutController::class, 'thanhtoan']);
Route::post('/dathang', [CheckoutController::class, 'dathang']);

//admin/danhmucsanpham
Route::get('/danh-muc-san-pham/{cateid}', [categoryProduct::class, 'show_cate_home']);
Route::get('/thuong-hieu-san-pham/{thid}', [categoryProduct::class, 'show_th_home']);

//thuongnhieu
Route::get('/admin/thuonghieu/hienthi', [ThuonghieuController::class, 'hienthi']);
Route::get('/admin/thuonghieu/them', [ThuonghieuController::class, 'them']);
Route::post('/admin/thuonghieu/action_them', [ThuonghieuController::class, 'action_them']);
Route::post('/admin/thuonghieu/action_sua/{id}', [ThuonghieuController::class, 'action_sua']);
Route::get('/admin/thuonghieu/sua/{id}', [ThuonghieuController::class, 'suath']);
Route::post('/admin/thuonghieu/xoa/{id}', [ThuonghieuController::class, 'xoath']);
Route::get('/admin/thuonghieu/hiden/{id}', [ThuonghieuController::class, 'hidden']);
Route::get('/admin/thuonghieu/show/{id}', [ThuonghieuController::class, 'show']);

//product
Route::get('/admin/sanpham/hienthi', [ProductController::class, 'hienthi']);
Route::get('/admin/sanpham/them', [ProductController::class, 'them']);
Route::post('/admin/sanpham/action_them', [ProductController::class, 'action_them']);
Route::post('/admin/sanpham/action_sua/{id}', [ProductController::class, 'action_sua']);
Route::get('/admin/sanpham/sua/{id}', [ProductController::class, 'sua']);
Route::post('/admin/sanpham/xoa/{id}', [ProductController::class, 'xoa']);
Route::get('/admin/sanpham/hiden/{id}', [ProductController::class, 'hidden']);
Route::get('/admin/sanpham/show/{id}', [ProductController::class, 'show']);

//category
Route::get('/admin', [admincontroller::class, 'showhome']);
Route::get('/admin/login', [admincontroller::class, 'login']);

//google
Route::get('/user/showlogin/login/google', [userController::class, 'login_google']) -> name('google-auth');
Route::get('/google/callback', [userController::class, 'CallbackGoogle']);
