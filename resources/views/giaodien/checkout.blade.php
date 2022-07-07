@extends('layout/header_footer')
@section('main')
 <!-- Begin Li's Breadcrumb Area -->
 <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">Thanh Toán</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <form action="#">
                                <div class="checkbox-form">
                                    <h3>Thông Tin Vận Chuyển</h3>
                                    <div class="row">
                                     
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Họ Và Tên <span class="required"></span></label>
                                                <h5>{{Auth::user()->full_name}}</h5>
                                                <input type="text" value="{{Auth::user()->full_name}}" name="fname">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Email <span class="required"></span></label>
                                                <h5> {{Auth::user()->email}}</h5>
                                                <input type="text" value="{{Auth::user()->email}}" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số Điện Thoại<span class="required"></span></label>
                                                <h5> {{Auth::user()->phone_number}}</h5>
                                                <input type="text" value="{{Auth::user()->phone_number}}" name="phonenum">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Giao <span class="required"></span></label>
                                                <h5> {{Auth::user()->address}}</h5>
                                                <input type="text" value="{{Auth::user()->address}}" name="addr">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="different-address">
                                        <div class="ship-different-title">
                                            <h3>
                                                <label>Vận Chuyển Đến Nơi Khác?</label>
                                                <input id="ship-box" type="checkbox">
                                            </h3>
                                        </div>
                                       
                                       
                                        <div id="ship-box-info" class="row">
                                    
                                            <div class="col-md-6">
                                            <td>
                                            <form action="{{route('dat_hang')}}" class="cart-quantity" method="POST" >
                                            @csrf
                                            <div class="checkout-form-list">
                                                <label>Họ Và Tên <span class="required"></span></label>
                                                <input placeholder="" type="text" name="fname">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Email <span class="required"></span></label>
                                                <input placeholder="" type="email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số Điện Thoại<span class="required"></span></label>
                                                <input type="text" name="phonenum"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list checkout-form-list">
                                                <label>Địa Chỉ Vận Chuyển <span class="required"></span></label>
                                                <input type="text" placeholder="" name="addr">

                                            </div>
                                        </div>
                                        </div>
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Các Yêu Cầu Khác</label>
                                                <textarea id="checkout-mess" cols="30" rows="10" name="notes"></textarea>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Thêm Vào Giỏ Hàng</button>
                                    
                                    </div>
                                </div>
                            </form>
                            </td>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Thông Tin Hóa Đơn</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Sản Phẩm</th>
                                                <th class="cart-product-total">Tổng Cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($takecart as $tc)
                                            <tr class="cart_item">
                                              <td class="cart-product-name"> {{$tc->model_name}}<strong class="product-quantity"> x{{$tc->pro_quantity}} </strong></td>
                                              <td class="cart-product-total"><span class="amount">  {{number_format($tc->price)}}<u> đ</u></span></td>  
                                            </tr>
                                            @endforeach
                                       </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Tổng Tiền Sản Phẩm</th>
                                                <td><span class="amount"> <u> đ</u></span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng Thanh Toán</th>
                                                <td><strong><span class="amount"> <u> đ</u></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                              <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Direct Bank Transfer.
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-2">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Cheque Payment
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-3">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  PayPal
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="order-button-payment">
                                           <input value="Thanh Toán" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Checkout Area End-->
@stop()