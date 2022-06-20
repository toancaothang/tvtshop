@extends('layout/header_footer')
@section('main')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">Danh Sách Yêu Thích</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            @if(session()->has('messtontaiwishlist'))
    <div class="alert alert-success">
        {{ session()->get('messtontaiwishlist') }}
    </div>
@endif
            <!--Wishlist Area Strat-->
            <div class="wishlist-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                               
                                                <th class="li-product-thumbnail">Ảnh Sản Phẩm</th>
                                                <th class="cart-product-name">Tên Sản Phẩm</th>
                                                <th class="li-product-price">Giá</th>
                                                <th class="li-product-stock-status">Tình Trạng</th>
                                                <th class="li-product-add-cart">Mua Sản Phẩm</th>
                                                <th class="li-product-remove">Xóa Khỏi Danh Sách</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prowishshow as $ps)
                                            <tr>
                                               
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{url('website/product')}}/{{$ps->getProduct->image}}" alt="" style="width:100px;height:100px;"></a></td>
                                                <td class="li-product-name"><a href="#"> </a> {{$ps->getProduct->model_name}}</td>
                                                <td class="li-product-price"><span class="amount"> {{number_format($ps->getProduct->getpro->first()->price)}}</span></td>
                                                <td class="li-product-stock-status"><span class="in-stock">Còn Hàng</span></td>
                                                <td class="li-product-add-cart"><a href="#">Thêm Vào Giỏ Hàng</a></td>
                                                <td class="li-product-remove"><a href="{{route('delete_wish',['id'=>$ps->id])}}"><i class="fa fa-times"></i></a></td>
                                                
                                            </tr>
                                            @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Wishlist Area End-->
@stop()