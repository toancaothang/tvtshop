<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Hash;

class KhachHangController extends Controller
{
    public function hienthidangky()
    {
        return view('auth.dn_dk');
    }
    public function xulydangky(Request $request){
        $us = KhachHang::where('ten_tk',$request->tentk)->first();
        if($us == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.");
        }
        $us = new KhachHang();
        $us->ten_tk = $request->tentk;
        $us->ho_ten = $request->ten;
        $us->mat_khau = bcrypt($request->get('matkhau'));
        $us->email = $request->email;
        $us->ngay_sinh = $request->ngaysinh;
        $us->dia_chi = $request->diachi;
        $us->sdt = $request->sdt;
        $us->gioi_tinh = $request->gioitinh;
        $us->trang_thai = 1;

        $us->save();
        return view('auth.dn_dk');
    }
}
