@extends('layout/header_footer')
@section('main')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Shop 4 Column</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Banner Area -->
                           
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                   <div class="toolbar-amount">
                                        <span>Showing 1 to 9 of 15</span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sắp xếp theo:</p>
                                        <select class="nice-select">
                                        <option value="price">Giá Thấp Đến Cao</option>
                                            <option value="price">Giá Cao Đến Thấp</option>
                                      <option value="lastest">Mới Nhất</option>
                                            <option value="old">Cũ Nhât</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                       
                                            <div class="row">
                                            @foreach($data as $searchrs)
                                            <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                            
                                                    <!-- single-product-wrap start -->
                                                  <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiet_sanpham',['cateid'=>$searchrs->category_id,'id'=>$searchrs->id])}}">
                                                                <img src="{{url('website/product')}}/{{$searchrs->image}}" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">Mới</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                     
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                              @for($i=1;$i<=$searchrs->total_rated;$i++)
                                                           <li><i class="fa fa-star-o"></i></li>
                                                            @endfor
                                                              @for($j=$searchrs->total_rated+1;$j<=5;$j++)
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                       @endfor
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$searchrs->category_id,'id'=>$searchrs->id])}}">{{$searchrs->model_name}} {{$searchrs->capacity}}GB</a></h4>
                                                                <div class="price-box">
                                                                @php $exsale=$searchrs->sale*$searchrs->price/100; @endphp
                                                               <span class="new-price new-price-2" id="price1">{{number_format($searchrs->price-$exsale)}} <u>đ</u></span>
                                                               @if($searchrs->sale)
                                                             <span id="salefix1">
                                                        <span class="old-price">{{number_format($searchrs->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$searchrs->sale}}%</span>
                                                        </span>
                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                               
                                                                <ul class="add-actions-link">
                                                                <form action="{{route('add_cart',['id'=>$searchrs->mid])}}" class="cart-quantity" method="POST" enctype="multipart/form-data">
                                                               @csrf
                                                                <input value="1" type="hidden" name="quaninput">
                                                                <input type="hidden" value=" <?php echo $searchrs->id;?>" name="productid"/>
                                                                <li style="width:145px;"> <button class="add-cart active" type="submit" style="border:none;width:145px;background-color:#FFCB09;color:black;" > Thêm Vào Giỏ Hàng </button></li>
                                                                    </form>
                                                                   <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                                   <form action="{{route('wish_list',['id'=>$searchrs->mid])}}" class="wishlist_add" method="POST">
                                                                @csrf
                                                              <span id="wish">
                                                                
                                                              <input type="hidden" value=" <?php echo $searchrs->id;?>" name="productidwish"/>
                                                             </span>
                                                             
                                                                   <li > <button style="border:none;width:35px;"><i class="fa fa-heart-o"style="color:deeppink;" ></i></button> </li>
                                                            </form>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    <!-- single-product-wrap end -->
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                
                                    
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
@stop()