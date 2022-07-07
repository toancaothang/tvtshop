@extends('layout/header_footer')
@section('main')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">So Sánh Sản Phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Compare Area -->
            @if(Session::get('compare'))
            <div class="compare-area pt-60 pb-60">
                <div class="container">
                <div class="compare-table table-responsive">
                        <div style="margin-bottom:10px;">
                    <button style="margin-bottom:10px;background-color: #0382C7;border: none;height: 39px;width: 158px;border-radius: 4px;"><a href="{{route('delete_compare')}}" style="color:white;"> Xóa So Sánh </a> </button>
</div>
                        <table class="table table-bordered table-hover mb-0">
                            <tbody>
                                <tr>
                                    <th class="compare-column-titles">Thiết Kế Sản Phẩm</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td class="compare-column-productinfo">
                                        <div class="compare-pdoduct-image">
                                            <a href="single-product.html">
                                                <img src="{{url('website/product')}}/{{$com['image']}}" style="width:100px;" alt="Product Image">
                                            </a>
                                            
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                       
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>
                                        <h5 class="compare-product-name"><a href="single-product.html"></a>{{$com['name']}} {{$com['capacity']}}GB</h5>
                                    </td>
                                  @endforeach
                                 
                                </tr>
                                <tr>
                              
                                    <th>Nhà Sản Xuất</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['branch']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                            
                                    <th>Giá</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                   @php $exsale=$com['sale']*$com['price']/100;
                                                $trueprice=$com['price']-$exsale;
                                                @endphp
                                    <td>{{$trueprice}}</td>
                                   
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Hệ Điều Hành</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['operasystem']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Màn Hình</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['screen']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>CPU</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['cpu']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>GPU</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['gpu']}}</td>
                                    @endforeach
                                
                                </tr>
                                <tr>
                                    <th>Ram</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['ram']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Memory</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['capacity']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Mô Tả Sản Phẩm</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['description']}}</td>
                                    @endforeach
                                    
                                </tr>
                                
                            
                                <tr>
                                    <th>Lượt Đánh Giá</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>
                                        <div class="li-pro-rating li-rattingbox">
                                            <ul class="rating">
                                            @for($i=1;$i<=$com['rate'];$i++)
                                            <li><i class="fa fa-star-o" style="font-size:30px;"></i></li>
                                            @endfor
                                            @for($j=$com['rate']+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o" style="font-size:30px;"></i></li>
                                            @endfor
                                            </ul>
                                            </div>
                                                         
                                        </div>
                                      
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Dung Lượng Bộ Nhớ Trong</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>
                                <a href="cart.html" class="ho-button ho-button-sm">
                                                <span>Thêm Vào Giỏ Hàng</span>
                                            </a>
</td>
@endforeach
</tr>
                            </tbody>
                            
                        </table>
                        

                    </div>
                </div>
            </div>
            @else
            <!-- Error 404 Area Start -->
            <div class="error404-area pt-30 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="error-wrapper text-center ptb-50 pt-xs-20">
                                <div class="error-text">
                                   <h2>Không Có Sản Phẩm Để So Sánh</h2>
                                    <p>Hãy Chọn Sản Phẩm Để Thêm Vào </p>
                                </div>
                                <div class="search-error">
                                <img src=" {{asset('images/menu/logo/compare.webp')}}" alt="" style="width:100px;" >
                                </div>
                                <div class="error-button" style="border-rad">
                                    <a href="index.html"style="color:black;">Bắt Đầu Thêm Sản Phẩm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Error 404 Area End -->
            @endif
            <!--// Compare Area -->
@stop()