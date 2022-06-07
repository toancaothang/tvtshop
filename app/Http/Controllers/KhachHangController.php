<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    public function hienthidangky()
    {
        return view('auth.dn_dk');
    }
    public function xulydangky(Request $request){
        $kh = KhachHang::where('ten_tk',$request->tentk)->first();
        if($kh == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.");
        }
        // $kh = new KhachHang();
        // $kh->ten_tk = $request->tentk;
        // $kh->ho_ten = $request->ten;
        // // $kh->mat_khau =bcrypt($request->get('matkhau'));
        // $kh->mat_khau = Hash::make($request->get('matkhau')); 
        // // $kh->mat_khau = $request->matkhau;
        // $kh->email = $request->email;
        // $kh->ngay_sinh = $request->ngaysinh;
        // $kh->dia_chi = $request->diachi;
        // $kh->sdt = $request->sdt;
        // $kh->gioi_tinh = $request->gioitinh;
        // $kh->trang_thai = 1;

        // $kh->save();
        $res = KhachHang::create($request->all());

        return view('auth.dn_dk');
    }
    public function hienthidangnhap(){
        // $ls = KhachHang::all();
        // dd($ls);
        return view('auth.dn_dk');
        
    }
    public function xulydangnhap(Request $request){
        // dd($request->all());

        $array = [
            'ten_tk' => $request->ten_tk,
            'mat_khau'=>$request->mat_khau,
        ];

        // $check_user = $request->only('ten_tk','mat_khau');
        if(Auth::attempt($array)){
            dd(123546);
        }else{ 
            dd(000);
        }

        // if (Auth::attempt(['ten_tk' => $request->username, 'mat_khau' => $request->password])) {
        //     return redirect()->back()->with("Đăng Nhập Thành Công");
        //     }else{
        //         return redirect()->back()->with("error","Đăng nhập không thành công");
        //     }
    }
}
