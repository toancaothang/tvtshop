<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use App\Models\SanPham;
use App\Models\ModelSP;
use App\Models\BinhLuan;
use App\Models\WishList;
use App\Models\CTHoaDon;
use App\Models\HoaDon;
use App\Models\Cart;
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
    public function wishlist(Request $req,$id){
      $prowish=Wishlist::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
        if(isset($prowish))
        {   
           dd("san pham da ton tai !");
        }
        else{
                $prowish = new WishList();
                $prowish->user_id=Auth::user()->id;
                $prowish->	model_pro_id=$id;
                $prowish->product_id=$req->productidwish;
              $prowish->save();
        
        }   

        $auth = Auth::user()->id;
        $prowishshow = WishList::join('product_model','wishlist.model_pro_id','=','product_model.id')->
        join('product','wishlist.product_id','=','product.id')
        ->where('user_id',$auth)->get(['wishlist.id as wid',
           'product_model.model_name',
           'product_model.image',
           'product.capacity',
           'product.price',
    ]);
    return view('giaodien.wishlist',compact('prowishshow'));

    }
    //xoa khoi wishlist
    public function deletewish($id)
    {
$delpro=WishList::find($id);
$delpro->delete();
return redirect('/wishlist')->with(['messtontaiwishlist' => 'Sản Phẩm Đã Được Xóa Khỏi Danh Sách Yêu Thích']);
    }
   
    //them vao cart 
    public function addcart(Request $request,$id){
        
       $procart=Cart::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
if(isset($procart))
{   
   dd("san pham da ton tai !");
}
else{
        $procart = new Cart();
$procart->user_id=Auth::user()->id;
$procart->pro_model_id=$id;
$procart->product_id=$request->productid;
$procart->pro_quantity=$request->quaninput;
$procart->save();


}   
$auth = Auth::user()->id;
    $procartshow = Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
    join('product','cart.product_id','=','product.id')
    ->where('user_id',$auth)->get(['cart.id as cid',
       'cart.pro_quantity',
       'product_model.model_name',
       'product_model.image',
       'product.capacity',
       'product.price',
]);
return view('giaodien.cart',compact('procartshow'));
}

     //xoa khoi cart
     public function deletecart($id)
     {
 $delpro=Cart::find($id);
 $delpro->delete();
 return redirect('/cart')->with(['messtontaiwishlist' => 'Sản Phẩm Đã Được Xóa Khỏi Danh Sách Yêu Thích']);
     }
   
    //update cart
    public function updatecart(Request $request){
        $prod_id=$request-> input('prod_id');
        $prod_qty=$request-> input('prod_qty');
      $cart=Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first();
        $cart->pro_quantity=$prod_qty;
        $cart->update();
 
    }

public function checkout(){

    $auth = Auth::user()->id;
    $takecart = Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
    join('product','cart.product_id','=','product.id')
    ->where('user_id',$auth)->get(['cart.id as cid',
       'cart.pro_quantity',
       'product_model.model_name',
       'product_model.image',
       'product.capacity',
       'product.price',]);
    return view('giaodien.checkout',compact('takecart'));
}

public function dathang( Request $request){
$order=new HoaDon();
$order->user_id=Auth::user()->id;
$order->receiver_fullname=$request->fname;
$order->receiver_email=$request->email;
$order->phone_number=$request->phonenum;
$order->deliver_address=$request->addr;
$order->notes=$request->notes;
$order->total=0;
$order->save();
$orderdetail=Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
join('product','cart.product_id','=','product.id')
->where('user_id',$auth)->get(['cart.id as cid',
   'cart.pro_quantity',
   'product_model.model_name',
   'product_model.image',
   'product.capacity',
   'product.price',]);
foreach($orderdetail as $detail)
{
 CTHoaDon::create([
'bill_id'=>$order->id,
'product_id'=>$detail->product_id,
'quantity'=>$detail->pro_quantity,
'unit_price'=>$detail->price,
]);
}

}   

}