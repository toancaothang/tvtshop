<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhachHangController;
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
});
Route::get('/dangky',[KhachHangController::class,'hienthidangky'])->name('hienthi_dangky');
Route::post('/dangky',[KhachHangController::class,'xulydangky'])->name('xuly_dangky');

Route::get('/dangnhap',[KhachHangController::class,'hienthidangnhap'])->name('hienthi_dangnhap');
Route::post('/dangnhap',[KhachHangController::class,'xulydangnhap'])->name('xuly_dangnhap');

    



    

