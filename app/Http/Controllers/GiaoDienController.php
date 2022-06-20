<?php

namespace App\Http\Controllers;
use App\Models\DanhMuc;
use App\Models\ModelSP;
use App\Models\User;
use App\Models\AnhSP;
use App\Models\WishList;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;

class GiaoDienController extends Controller
{
// hien thi du lieu ra trang chu
public function httrangchu(){
$newpro=ModelSP::where('status',1)->limit(10)->orderBy('id','DESC')->get();
$danhmucss=DanhMuc::where('id',1)->first();
$samsung=ModelSP::where('category_id',$danhmucss->id)->orderBy('id','DESC')->get();
$danhmucapple=DanhMuc::where('id',2)->first();
$apple=ModelSP::where('category_id',$danhmucapple->id)->orderBy('id','DESC')->get();
    return view('welcome',compact('newpro','samsung','apple'));
}

    //xu ly hien thi danh muc
    public function danhmucsp(){
        $product=ModelSP::all();
        $category= DanhMuc::where('status',1)->orderBy('id')->get();
      return view('layout.header_footer',compact('product','category'));
     
    }
    //xu ly hien thi san pham trong danh muc
public function hienthidanhmuc($id){
  
    $categoryshow=DanhMuc::where('id',$id)->first();
    $productshow=ModelSP::where('category_id',$categoryshow->id)->get();
 return view('giaodien.category_product',compact('productshow','categoryshow'));
}
// xem chi tiet san pham
public function chitietsanpham($cateid,$id){
    $ctmodel=ModelSP::find($id);
    $bienthe=SanPham::where('model_id',$ctmodel->id)->get();
$modelimage=AnhSP::where('model_id',$id)->get();
$samecate=DanhMuc::where('id',$cateid)->first();
$samemodel=ModelSP::where('category_id',$samecate->id)->get();
$commentshow=BinhLuan::where('model_id',$id)->get();
return view('giaodien.product_details',compact('ctmodel','modelimage','samemodel','samecate','commentshow','bienthe'));
}


//hien thi wishlist
public function hienthiwishlist()
{
    $auth = Auth::user()->id;
    $prowishshow = WishList::where('user_id',$auth)->get();
   return view('giaodien.wishlist',compact('prowishshow'));
}
public function wishlistcount($id)
{
    $wishcount=WishList::count($id);
    return view('layout.header_footer',compact('wishcount'));
}

}