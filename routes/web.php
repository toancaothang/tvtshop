<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\GiaoDienController;
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

Route::get('/', function () {
    return view('welcome');
})->name('trangchu');
// USER:
// Dang ky
Route::get('/dangky',[KhachHangController::class,'hienthidangky'])->name('hienthi_dangky');
Route::post('/dangky',[KhachHangController::class,'xulydangky'])->name('xuly_dangky');
// Dang Nhap
Route::get('/dangnhap',[KhachHangController::class,'hienthidangnhap'])->name('hienthi_dangnhap');
Route::post('/dangnhap',[KhachHangController::class,'xulydangnhap'])->name('xuly_dangnhap');
Route::post('/dangxuat',[KhachHangController::class,'xulydangxuat'])->name('xuly_dangxuat');
Route::get('/profile',[KhachHangController::class,'hienthiprofile'])->name('hienthi_profile')->middleware('CheckLogin');
//tim kiem
Route::post('/',[KhachHangController::class,'xulytimkiem'])->name('timkiem');
//binh luan
Route::post('/comment/{id}',[KhachHangController::class,'binhluanuser'])->name('binh_luan')->middleware('CheckLogin');
//them vao wishlist
Route::get('/wishlist/{id}',[KhachHangController::class,'wishlist'])->name('wish_list')->middleware('CheckLogin');
//xoa khoi wishlist
Route::get('/delete-wishlist/{id}',[KhachHangController::class,'deletewish'])->name('delete_wish');
// GIAO DIEN:
//show du lieu ra trang chu
Route::get('/',[GiaoDienController::class,'httrangchu'])->name('htsp_trangchu');
//hien thi san pham trong danh muc
Route::get('/product/{id}',[GiaoDienController::class,'hienthidanhmuc'])->name('hienthi_danhmuc');
//hien thi chi tiet san pham
Route::get('/chi-tiet-sanpham/{cateid}/{id}',[GiaoDienController::class,'chitietsanpham'])->name('chitiet_sanpham');
//hien thi wishlist
Route::get('/wishlist',[GiaoDienController::class,'hienthiwishlist'])->name('hienthi_wishlist')->middleware('CheckLogin');
Route::get('/wishlist_count/{id}',[GiaoDienController::class,'wishlistcount'])->name('wish_count');






    



    

