@extends('layout/header_footer')
@section('main')

<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">Xem Sản Phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                           
                            <div class="product-details-left">
                            
                                <div class="product-details-images slider-navigation-1">
                                @foreach($modelimage as $modelimg)
                            <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{url('website/product')}}/{{$modelimg->file_name}}"data-gall="myGallery">
                                            <img src="{{url('website/product')}}/{{$modelimg->file_name}}" alt="product image">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                              
                                <div class="product-details-thumbs slider-thumbs-1">  
                                @foreach($modelimage as $modelimg)                                      
                                    <div class="sm-image"><img src="{{url('website/product')}}/{{$modelimg->file_name}}" alt="product image thumb"></div>
                                    @endforeach
                                </div>
                               
                            </div>

                           
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2>{{$ctmodel->model_name}} {{$ctmodel->getpro->first()->capacity}} GB</h2>
                                   <div class="rating-box pt-20">
                                        <ul class="rating rating-with-review-item">
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            <li class="review-item"><a href="#">Đọc Đánh Giá</a></li>
                                            <li class="review-item"><a href="#">Viết Đánh Giá</a></li>
                                        </ul>
                                    </div>
                                    <div class="price-box pt-20">
                                    <label>Giá </label>
                                        <span class="new-price new-price-2">{{number_format($ctmodel->getpro->first()->price)}} <u>đ </u></span>
                                    </div>
                                    <div class="product-variants">
                                        <div class="produt-variants-size">
                                            <label>Chọn Mẫu Khác Của {{$ctmodel->model_name}} </label>
                                           <select class="nice-select">
                                            @foreach ($bienthe as $bt)
                                                <option value="$bienthe->id" >{{$bt->capacity}} GB</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                       
                                        </div>
                                    </div>
                                    <div class="single-add-to-cart">
                                        <form action="#" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Số Lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Thêm Vào wishlist</a>
                                        <div class="product-social-sharing pt-25">
                                            
                                        </div>
                                    </div>
                                    <div class="block-reassurance">
                                        <ul>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Thông Tin</span></a></li>
                                   <li><a data-toggle="tab" href="#product-details"><span>Thông Số  </span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Đánh Giá {{$ctmodel->model_name}}</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span class="show-info">{{$ctmodel->describe}}</span>
                            </div>
                        </div>
                        <div id="product-details" class="tab-pane" role="tabpanel">
                            <div class="product-details-manufacturer">
                                <a href="#">
                                    <!--<img src="..." alt="Product Manufacturer Image"> -->
                                </a>
                                <p class="show-thongso"><span class="show-thongso-tittle">Màn hình: </span>{{$ctmodel->screen}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Hệ điều hành: </span> {{$ctmodel->opera_sys}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Camera sau: </span> {{$ctmodel->back_camera}} MP</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Camera trước: </span> {{$ctmodel->front_camera}} MP</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Dung Lượng Bộ Nhớ Trong: </span> <!--{{$ctmodel->capacity}}--> GB</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">CPU: </span> {{$ctmodel->cpu}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">GPU: </span> {{$ctmodel->gpu}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">RAM: </span> {{$ctmodel->ram}} GB</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">SIM: </span> {{$ctmodel->sim}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Pin: </span> {{$ctmodel->pin}}</p>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                          
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                @foreach($commentshow as $cs)
                                    <div class="comment-review">
                                       <span>{{$cs->comment_name}} </span>
                                       <ul class="rating">
                                       @for ($i = 0; $i < 5; $i++)
          @if ($i < $cs->stars)
          <li><i class="fa fa-star-o"></i></li>
          @else
          <li class="no-star"><i class="fa fa-star-o"></i></li>
          @endif
        @endfor
        </ul>
                                    </div>
                                   <div class="comment-details">
                                   <p>{{$cs->content}}</p>
                                        <p>{{$cs->created_at}}</p>
                                    </div>
                                    @endforeach
                                    
                                    <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết Bình Luận</a>
                                    </div>
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                         
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="{{url('website/product')}}/{{$ctmodel->image}}" alt="Li's Product" width="300px;">
                                                               <div class="li-review-product-desc">
                                                                   <p class="li-product-name"style="font-size:20px;">{{$ctmodel->model_name}}</p>
                                                                   
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Đánh Giá Của Bạn</h3>
                                                                        <form action="{{route('binh_luan',['id'=>$ctmodel->id])}}" method="POST">
                                                                        @csrf
                                                                            <p class="your-opinion">
                                                                              
                                                                                <span>
                                                                                    <select class="star-rating" name="stars">
                                                                                      <option value="1">1</option>
                                                                                      <option value="2">2</option>
                                                                                      <option value="3">3</option>
                                                                                      <option value="4">4</option>
                                                                                      <option value="5">5</option>
                                                                                    </select>
                                                                                </span>
                                                                            </p>
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Nội Dung</label>
                                                                                <textarea id="feedback" name="content" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                               <div class="feedback-btn pb-15">
                                                                               <button type="submit"  value="Submit">Gửi Bình Luận</button>
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Đóng</a>
                                                                             
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Các Sản Phẩm Khác Cùng Danh Mục</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($samemodel as $samem)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{url('website/product')}}/{{$samem->image}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">Mới</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">NSX</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">{{$samem ->model_name}}</a></h4>
                                                    <div class="price-box">
                                                    <span class="new-price new-price-2">....</span>
                                                        <span class="old-price">000</span>
                                                        <span class="discount-percentage">-7%</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="#">Thêm Vào Giỏ Hàng</a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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
            </section>


@stop()