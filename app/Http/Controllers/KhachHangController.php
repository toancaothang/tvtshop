<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use App\Models\SanPham;
use App\Models\ModelSP;
use App\Models\BinhLuan;
use App\Models\WishList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;

class KhachHangController extends Controller
{
    public function hienthidangky()
    {
        return view('user.dn_dk');
    }
    public function xulydangky(Request $request){
        $request->validate(['tentk'=>'required',
        'matkhau'=>'required'
        ,'ten'=>'required',
        'email'=>'required',
        'ngaysinh'=>'required'
        ,'sdt'=>'required'
        ,'diachi'=>'required'
        
    ],['tentk.required'=>'Không được để trống tên tài khoản'
    ,'matkhau.required'=>'Không được để trống tên mật khẩu']);
    
    $kh = new KhachHang();
        $kh->username = $request->tentk;
        $kh->full_name = $request->ten;
        $kh->password =bcrypt($request->get('matkhau'));
        $kh->email = $request->email;
        $kh->birth = $request->ngaysinh;
        $kh->address = $request->diachi;
        $kh->phone_number = $request->sdt;
        $kh->gender = $request->gioitinh;
        $kh->status = 1;
  $kh->save();
        return view('user.dn_dk');
    }
    public function hienthidangnhap(){
        return view('user.dn_dk');
        
    }
    public function xulydangnhap(Request $request){
        // dd($request->all());
        $request->validate(['username'=>'required','password'=>'required'
        
    ],['username.required'=>'Không được để trống tên tài khoản',
    'password.required'=>'Không được để trống tên mật khẩu']);
    
        $array = [
            'username' => $request->username,
            'password'=>$request->password,
        ];
        $tentkkh= $request->username;
        if(Auth::attempt($array)){
            $user=KhachHang::where('username',$tentkkh)->first();
            Auth::login($user);
            return redirect('/');
        }else{ 
            dd('khong vo');
        }
        
    }

    public function xulydangxuat(){
        Auth::logout();
     return redirect('/');
    }
    public function hienthiprofile(){
        
        return view('user.user_profile');
    }
    //Binh Luan User
    public function binhluanuser($id,Request $request)
    {
        $idpro=$id;
        $sanpham=ModelSP::find($id);
        $comment=new BinhLuan();
        $comment->model_id = $idpro;
        $comment->user_id = Auth::user()->id;
        $comment->comment_name = Auth::user()->full_name;
        $comment->content = $request->content;
        $comment->admin_id = 1;
        $comment->stars =  $request->stars;
        $comment->save();
        return redirect()->back();

    }
    //them vao wishlist 
    public function wishlist($id){
        $prowish=WishList::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
if(isset($prowish))
{   
    return redirect('/wishlist')->with(['messtontaiwishlist' => 'Sản Phẩm Đã Tồn Tại']);
}
else{
        $wl = new Wishlist();
$wl->user_id=Auth::user()->id;
$wl->product_id=$id;
$wl->save();
}   
$auth = Auth::user()->id;
$prowishshow = WishList::where('user_id',$auth)->get();

return view('giaodien.wishlist',compact('prowishshow'));

    }
    //xoa khoi wishlist
    public function deletewish($id)
    {
$delpro=WishList::find($id);
$delpro->delete();
return redirect('/wishlist')->with(['messtontaiwishlist' => 'Sản Phẩm Đã Được Xóa Khỏi Danh Sách Yêu Thích']);
    }
   
}       
