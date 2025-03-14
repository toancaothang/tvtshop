<?php

namespace App\Http\Controllers;
use App\Models\DanhMuc;
use App\Models\ModelSP;
use App\Models\User;
use App\Models\AnhSP;
use App\Models\CTHoaDon;
use App\Models\HoaDon;
use App\Models\WishList;
use App\Models\SanPham;
use App\Models\Cart;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;
use Session;
class GiaoDienController extends Controller
{
// hien thi du lieu ra trang chu
public function httrangchu(){
$newpro=ModelSP::where('status',1)->orderBy('updated_at','DESC')->get()->take(5);
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
    //hien thi bai viet
    public function hienthibaiviet(){
       $tintuc=TinTuc::get();

        return view('giaodien.blog',compact('tintuc'));
    }

//tat ca san pham
public function allproduct(){
$productshow=ModelSP::with('getpro')->with('getimage')->with('getcomment')->get();
return view('giaodien.product_all',compact('productshow'));

}

    //xu ly hien thi san pham trong danh muc
public function hienthidanhmuc(Request $request,$id){
    if($request->ajax()){
        $data=$request->all();
        $url=$data['url'];
        //echo "<pre>"; print_r($data); die;
       $categoryshow=DanhMuc::where('id',$id)->first();
$productshow=ModelSP::with('getpro')->with('getimage')->with('getcomment')->where('category_id',$categoryshow->id);
//neu co filter dung luong
if(isset($data['capavalue'])&&!empty($data['capavalue'])){

   
}

//neu co filter ram
if(isset($data['ramvalue'])&&!empty($data['ramvalue'])){
    $productshow->whereIn('ram',$data['ramvalue']);
}

// neu co sort
if(isset($data['sort'])&&!empty($data['sort'])){
    if($data['sort']=="toprate")
    {
        $productshow->orderBy('total_rated','Desc');
    }
    elseif($data['sort']=="lastest")
    {
        $productshow->orderBy('id','Desc');
    }
    else if($data['sort']=="old")
    {
        $productshow->orderBy('id','Asc');
    }
    else if($data['sort']=="lowtohigh")
    {
        $productshow->with(['getpro'=>function($q) {
            $q->orderBy('id','Asc');
        }
    ])->addSelect(['price'=>SanPham::selectRaw('Min(price)')->whereColumn('product_model.id','product.model_id')])->orderBy('price','Asc');
    }
    else if($data['sort']=="hightolow")
    {
        $productshow->with(['getpro'=>function($q) {
            $q->orderBy('id','Asc');
        }
    ])->addSelect(['price'=>SanPham::selectRaw('Min(price)')->whereColumn('product_model.id','product.model_id')])->orderBy('price','Desc');
    }
    $productshow=$productshow->paginate(6);
}
else{
    $productshow=ModelSP::with('getpro')->with('getimage')->with('getcomment')->where('category_id',$categoryshow->id)->paginate(6);
}
return view('giaodien/ajaxview.sort_pro',compact('productshow','categoryshow','id'));

        }else{
            $categoryshow=DanhMuc::where('id',$id)->first();
            $productshow=ModelSP::with('getpro')->with('getimage')->with('getcomment')->where('category_id',$categoryshow->id)->paginate(6);
            return view('giaodien.category_product',compact('productshow','categoryshow','id'));


        }

  
}
//edit user
public function editprofile(){

    return view('user.edit_user');
    }
// xem chi tiet san pham
public function chitietsanpham($cateid,$id){
    $ctmodel=ModelSP::find($id);
    $bienthe=SanPham::where('model_id',$ctmodel->id)->get();
$modelimage=AnhSP::where('model_id',$id)->get();
$samecate=DanhMuc::where('id',$cateid)->first();
$samemodel=ModelSP::where('category_id',$samecate->id)->get();
$commentshow=BinhLuan::where('model_id',$id)->get();
$commentcount=BinhLuan::where('model_id',$id)->get();
$commentsum=BinhLuan::where('model_id',$id)->sum('stars');
if($commentcount->count()>0)
{
    $commentvalue=$commentsum/$commentcount->count();
  $ctmodel->total_rated=$commentvalue;
}
else{
    $commentvalue=0;
    $ctmodel->total_rated=$commentvalue;
}
$ctmodel->save();

return view('giaodien.product_details',compact('ctmodel','modelimage','samemodel','samecate','commentshow','bienthe','commentcount','commentvalue'));
}


//hien thi wishlist
public function hienthiwishlist()
{
    $auth = Auth::user()->id;
    $prowishshow = WishList::join('product_model','wishlist.model_pro_id','=','product_model.id')->
    join('product','wishlist.product_id','=','product.id')
    ->where('user_id',$auth)->get(['wishlist.id as wid',
       'product_model.model_name',
       'product_model.image',
       'product.capacity',
       'product.price',
       'product.sale',
]);
return view('giaodien.wishlist',compact('prowishshow'));
}
//dem so luong sp trong wishlist
public function wishlistcount($id)
{
    
    $wishcount=WishList::count($id);
    return view('layout.header_footer',compact('wishcount'));
}
//chon bien the vao cart
public function selectbienthe(Request $req){
$produm= $req->produm;
$bienthes=$req->bienthes;
$productinfo=SanPham::where('model_id',$produm)->where('capacity',$bienthes)->get();
foreach($productinfo as $sprice){
    $exsale=$sprice->price*$sprice->sale/100;
    echo number_format($sprice->price-$exsale) ." <u>đ</u>";?>
    <input type="hidden" value=" <?php echo $sprice->id;?>" name="productid"/>
    <input type="hidden" value=" <?php echo $sprice->price-$exsale;?>" name="newprice"/>
    
    <?php
}
  }
//chon bien the vao wishlist
public function selectwishlist(Request $req){
    $produm= $req->produm;
    $bienthes=$req->bienthes;
    $productinfo=SanPham::where('model_id',$produm)->where('capacity',$bienthes)->get();
    foreach($productinfo as $sprice){
        ?>
        <input type="hidden" value=" <?php echo $sprice->id;?>" name="productidwish"/>
    <?php
    }
}
//thay doi thong tin chi tiet san pham

public function changeinfo(Request $req){
    
    $produm= $req->produm;
    $bienthes=$req->bienthes;
    $productinfo=SanPham::where('model_id',$produm)->where('capacity',$bienthes)->get();
    foreach($productinfo as $sprice){
        echo $sprice->capacity ." GB";?>
       
        
        <?php
    }
}
// chon bien the vao so sanh 
public function selectcompare(Request $req){
    
    $produm= $req->produm;
    $bienthes=$req->bienthes;
    $productinfo=SanPham::where('model_id',$produm)->where('capacity',$bienthes)->get();
    foreach($productinfo as $sprice){
        ?>
        <input type="hidden" value=" <?php echo $sprice->id;?>" name="productid"/>
       <?php
    }
}
// chon bien the sale
public function selectsale(Request $req){
    
    $produm= $req->produm;
    $bienthes=$req->bienthes;
    $productinfo=SanPham::where('model_id',$produm)->where('capacity',$bienthes)->get();
    foreach($productinfo as $sprice){
        if($sprice->sale){
        ?>
         <span class="old-price" style="text-decoration:line-through; margin-left:10px;font-size:22px;"><?php echo number_format($sprice->price);?><u> đ </u></span>
         <span class="discount-percentage" style="margin-left:10px;font-size:22px;color:#E80F0F;">-<?php echo number_format($sprice->sale);?>%</span>
        
       <?php
       }
    }
}
// chon bien the sale
public function selectsalecate(Request $req){
    
    $produm= $req->produm;
    $bienthes=$req->bienthes;
    $productinfo=SanPham::where('model_id',$produm)->where('capacity',$bienthes)->get();
    foreach($productinfo as $sprice){
        if($sprice->sale){
        ?>
        
         <span class="old-price" style="text-decoration:line-through;" ><?php echo number_format($sprice->price);?><u>đ </u></span>
         <span class="discount-percentage">-<?php echo number_format($sprice->sale);?>%</span>
        
       <?php
       }
    }
}
//show cart
public function hienthicart()
{
    $auth = Auth::user()->id;
    $takecart=Cart::get();
    $procartshow = Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
    join('product','cart.product_id','=','product.id')
    ->where('user_id',$auth)->get(['cart.id as cid',
       'cart.pro_quantity',
       'product_model.model_name',
       'product_model.image',
       'product.capacity',
       'product.price',
       'cart.product_id',
       'product.sale',
]);
return view('giaodien.cart',compact('procartshow'));
}

    //show nhanh cart

    public function quickcart()
    {
        $auth = Auth::user()->id;
        $quickcart = Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
        join('product','cart.product_id','=','product.id')
        ->where('user_id',$auth)->get(['cart.id as cid',
           'cart.pro_quantity',
           'product_model.model_name',
           'product_model.image',
          'product.capacity',
           'product.price',
           'product.sale',
    ]);
    return view('layout.header_footer',compact('quickcart'));
        }
// hien thi thong tin mua hang
public function purchaselist()
{
    $hoadon=HoaDon::where('user_id',Auth::user()->id)->get();
return view('user.thongtingiaodich',compact('hoadon'));
}
// hien thi chi tiet hoa don mua hang
public function billdetails($id)
{
    $billinfo=HoaDon::find($id);
    $billdetails=CTHoaDon::join('bill','bill_details.bill_id','=','bill.id')->join('product_model','bill_details.pro_model_id','=','product_model.id')->join('product','bill_details.product_id','=','product.id')->where('user_id',Auth::user()->id)
    ->where('bill_id',$id)
    ->get();
 
return view('user.bill_details',compact('billdetails','billinfo'));
}



}