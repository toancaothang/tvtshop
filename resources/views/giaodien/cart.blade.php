@extends('layout/header_footer')
@section('main')
<script>
$(document).ready(function()
{
$.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('.qtybutton').click(function(e){
e.preventDefault();
var prod_id=$(this).closest('.prod-data').find('.prod_id').val();
var qty=$(this).closest('.prod-data').find('.qty-input').val();
data={
    'prod_id' : prod_id,
    'prod_qty' : qty,
}
$.ajax({
method: "POST",
url: "update-cart",
data: data,
success: function(response){
    window.location.reload();
}
});

});
});


   </script> 
  <!-- Begin Li's Breadcrumb Area -->
  <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">Giỏ Hàng </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                           
                                                <th class="li-product-thumbnail">Ảnh Sản Phẩm</th>
                                                <th class="cart-product-name">Sản Phẩm</th>
                                                <th class="li-product-price">Đơn Giá</th>
                                                <th class="li-product-quantity">Số Lượng</th>
                                                <th class="li-product-subtotal">Tổng Cộng</th>
                                                <th class="li-product-remove">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total=0 @endphp
                                            @foreach($procartshow as $pc)
                                            <tr class="prod-data">
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{url('website/product')}}/{{$pc->image}}" alt="" style="width:100px;height:100px;"></a></td>
                                                <td class="li-product-name"><a href="#">{{$pc->model_name}} {{$pc->capacity}} GB</a></td>
                                                <td class="li-product-price"><span class="amount">{{number_format($pc->price)}} <u> đ</u></span></td>
                                                <td class="quantity">
                                                <input type="text" class="prod_id" value="{{$pc->product_id}}" />
                                                    <label>Số Lượng</label>
                                                    <div class="cart-plus-minus">
                                                       <input class="cart-plus-minus-box qty-input" value="{{$pc->pro_quantity}}" type="text" name="cartquan">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
                                             @php $subtotal=$pc->price * $pc->pro_quantity; @endphp
                                                <td class="product-subtotal"><span class="amount"></span>{{number_format($subtotal)}} <u> đ</u></td>
                                                <td class="li-product-remove"><a href="{{route('delete_cart',['id'=>$pc->cid])}}"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            @php $total+= $pc->price * $pc->pro_quantity; @endphp
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Mã Giảm Giá" type="text">
                                                <input class="button" name="apply_coupon" value="Nhập Vào Mã Giảm Giá" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Cập Nhật Giỏ Hàng" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Tổng Thanh Toán</h2>
                                            <ul>
                                                <li>Tổng Sản Phẩm <span>{{number_format($total)}} <u> đ</u></span></li>
                                                <li>Tổng Đơn Hàng <span>{{number_format($total)}} <u> đ</u></span></li>
                                            </ul>
                                            <a href="{{route('check_out')}}">Thanh Toán</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            <!--Shopping Cart Area End-->
@stop()