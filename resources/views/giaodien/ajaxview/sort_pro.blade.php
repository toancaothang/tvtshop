 <!-- shop-products-wrapper start -->
 <div class="shop-products-wrapper ajaxupdate" id="">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                           
 @foreach($productshow as $value)
    <div class="col-lg-4 col-md-4 col-sm-6 mt-40" >
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap" id="updateDiv">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">
                                                                <img src="{{url('website/product')}}/{{$value->image}}" alt="">
                                                            </a>
                                                            <span class="sticker">Mới</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                <h5 class="manufacturer">

                                                              
                                                                    @foreach($value->getpro as $getpro)
                                                                        
                                                                        <div class="update-bienthe"  type="submit" data-type="{{$getpro->capacity}}" data-id="{{$value->id}}" tabindex="1" style="width:70px; padding-left:17px;padding-top:7px; margin-bottom:0px;" >{{$getpro->capacity}}GB</div>
                                                                        
                                                                  @endforeach
                                                                  <input type="hidden" value="<?php echo $value->id?>" id="produm-{{ $value->id }}" class="produm"/> 
                                                                    </h5>
                                                                    
                                                                   
                                                                </div>
                                                                
                                                                <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">{{$value->model_name}} </a></h4>
                                                                
                                                            <form action="{{route('com_pare',['id'=>$value->id])}}" class="compare_add" method="POST" >
                                            @csrf
                                            <span id="compares-{{$value->id}}">
                                            <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid"/>
                                            
                                            </span>
                                            <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>

                                           </form>
                                                               <div class="price-box">
                                                                
                                                                <form action="{{route('add_cart',['id'=>$value->id])}}" class="cart-quantity" method="POST" enctype="multipart/form-data" style="margin-top:-4px;">
                                                                @php $exsale=$value->getpro->first()->sale*$value->getpro->first()->price/100; @endphp
                                                                @csrf
                                                               <span class="new-price new-price-2" id="price-{{ $value->id }}">{{number_format($value->getpro->first()->price-$exsale)}} <u>đ</u>
                                                               
                                                               <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid" />
                                                            </span>
                                                               @if($value->getpro->first()->sale)
                                                             <span id="salefix-{{ $value->id }}">
                                                        <span class="old-price">{{number_format($value->getpro->first()->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$value->getpro->first()->sale}}%</span>
                                                        </span>
                                                        @endif
                                                                </div>
                                                                <div class="rating-box">
                                                                        <ul class="rating">
                                                                        @for($i=1;$i<=$value->total_rated;$i++)
                                            <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                            @for($j=$value->total_rated+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endfor
                                                                        </ul>
                                                                    </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                <input class="cart-plus-minus-box " value="1" type="hidden" name="quaninput">
                                                               <li style="width:145px;"> <button class="add-cart active" type="submit" style="border:none;width:145px;background-color:#FFCB09;color:black;" > Thêm Vào Giỏ Hàng </button></li>
                                                                    
                                                                    </form> 
                                                                    <li><a href="#" title="Xem Nhanh Sản Phẩm" class="quick-view-btn" data-toggle="modal" data-target="#xemnhanh-{{$value->id}}"><i class="fa fa-eye"></i></a></li>
                                                                    <form action="{{route('wish_list',['id'=>$value->id])}}" class="wishlist_add" method="POST">
                                                                @csrf
                                                              <span id="wish-{{$value->id}}">
                                                                
                                                              <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productidwish"/>
                                                             </span>
                                                             
                                                                   <li > <button style="border:none;width:35px;"><i class="fa fa-heart-o"style="color:deeppink;" ></i></button> </li>
                                                            </form>
                                                        
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <!-- single-product-wrap end -->
                                                    </div>
                                                    <!-- Begin Quick View | Modal Area -->
            <div class="modal fade modal-wrapper" id="xemnhanh-{{$value->id}}" >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-inner-area row">
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                    <!-- Product Details Left -->
                                        <div class="product-details-left">
                                    
                                            <div class="product-details-images slider-navigation-1">
                                            @foreach($value->getimage as $getimage)
                                                <div class="lg-image">
                                                    <img src="{{url('website/product')}}/{{$getimage->file_name}}" alt="product image">
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="product-details-thumbs slider-thumbs-1">  
                                            @foreach($value->getimage as $getimage)
                                                <div class="sm-image"><img src="{{url('website/product')}}/{{$getimage->file_name}}" alt="product image thumb"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!--// Product Details Left -->
                                    </div>

                                    <div class="col-lg-7 col-md-6 col-sm-6">
                                        <div class="product-details-view-content pt-60">
                                            <div class="product-info">
                                                <h2>{{$value->model_name}} </h2>
                                            <div class="rating-box pt-20">
                                                    <ul class="rating rating-with-review-item">
                                                    @for($i=1;$i<=$value->total_rated;$i++)
                                                <li><i class="fa fa-star-o"></i></li>
                                                @endfor
                                                @for($j=$value->total_rated+1;$j<=5;$j++)
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                @endfor
                                                        <li class="review-item"><a href="#">{{$value->getpro->count()}}</a></li>
                                                    </ul>
                                                </div>
                                                <div class="price-box pt-20" >
                                                @php $exsale=$value->getpro->first()->sale*$value->getpro->first()->price/100; @endphp
                                                                <span class="new-price new-price-2" id="price1-{{$value->id}}">{{number_format($value->getpro->first()->price-$exsale)}} <u>đ</u></span>
                                                                @if($value->getpro->first()->sale)
                                                                <span id="salefix1-{{$value->id}}">
                                                            <span class="old-price" style="text-decoration:line-through;">{{number_format($value->getpro->first()->price)}}<u> đ</u></span>
                                                            <span class="discount-percentage">-{{$value->getpro->first()->sale}}%</span>
                                                            </span>
                                                            @endif
                                                </div>
                                                
                                                <div class="product-desc">
                                                    <p>
                                                        <span>{{$value->description}}
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="product-variants">
                                                    <div class="produt-variants-size">
                                                    <label>Chọn Mẫu Khác Của {{$value->model_name}} </label>
                                                <ul>
                                                @foreach($value->getpro as $getpro)
                                                <div class="update-bienthe" type="submit" data-type="{{$getpro->capacity}}" data-id="{{$value->id}}" tabindex="1"  >{{$getpro->capacity}}GB</div>
                                                @endforeach
                                                <input type="hidden" value="<?php echo $value->id?>" id="produm-{{ $value->id }}" class="produm"/> 
    </ul>                         
                                                    </div>
                                                </div>
                                                <div class="single-add-to-cart">
                                                    <form action="#" class="cart-quantity">
                                                        <div class="quantity">
                                                            <label>Quantity</label>
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                            </div>
                                                        </div>
                                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                                    </form>
                                                </div>
                                                <div class="product-additional-info pt-25">
                                                    <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                                    <div class="product-social-sharing pt-25">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <!-- Quick View | Modal Area End Here -->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- hien thi list -->
                                            @foreach($productshow as $value)
                                                    <div class="row product-layout-list">
                                                        <div class="col-lg-3 col-md-5 ">
                                                            <div class="product-image">
                                                                <a href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">
                                                                    <img src="{{url('website/product')}}/{{$value->image}}" alt="Li's Product Image">
                                                                </a>
                                                                <span class="sticker">Mới</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-7">
                                                            <div class="product_desc">
                                                                <div class="product_desc_info">
                                                                    <div class="product-review">
                                                                        <h5 class="manufacturer">
                                                                        
                                                                        </h5>
                                                                        <div class="rating-box">
                                                                            <ul class="rating">
                                                                            @for($i=1;$i<=$value->total_rated;$i++)
                                                <li><i class="fa fa-star-o"></i></li>
                                                @endfor
                                                @for($j=$value->total_rated+1;$j<=5;$j++)
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                @endfor
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">{{$value->model_name}}</a></h4>
                                                                    <div class="price-box">
                                                                    <form action="{{route('add_cart',['id'=>$value->id])}}" class="cart-quantity" method="POST" enctype="multipart/form-data" style="margin-top:-4px;">
                                                                    @csrf
                                                                    @php $exsale=$value->getpro->first()->sale*$value->getpro->first()->price/100; @endphp
                                                                <span class="new-price new-price-2" id="price2-{{$value->id}}">{{number_format($value->getpro->first()->price-$exsale)}} <u>đ</u>
                                                                
                                                                <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid" />
                                                                </span>
                                                                @if($value->getpro->first()->sale)
                                                                <span id="salefix2-{{ $value->id }}">
                                                            <span class="old-price">{{number_format($value->getpro->first()->price)}}<u> đ</u></span>
                                                            <span class="discount-percentage">-{{$value->getpro->first()->sale}}%</span>
                                                            </span>
                                                            @endif
                                                                    </div>
                                                                    <h5 class="manufacturer">
                                                                        @foreach($value->getpro as $getpro)
                                                                            
                                                                            <div class="update-bienthe" type="submit" data-type="{{$getpro->capacity}}" data-id="{{$value->id}}"tabindex="1" style="width:70px; padding-left:17px;padding-top:7px; margin-bottom:0px;margin-top:10px;" >{{$getpro->capacity}}GB</div>
                                                                        
                                @endforeach
                                                                        <input type="hidden" value="<?php echo $value->id?>" id="produm-{{ $value->id }}" class="produm"/> 
                                                                        <input class="cart-plus-minus-box " value="1" type="text" name="quaninput">
                                                                </h5>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="shop-add-action mb-xs-30">
                                                                <ul class="add-actions-link">
                                                            
                                                                    <button type="submit" style="border:none;background-color:white;">Thêm Vào Giỏ Hàng</button>
                                                                    </form>
                                                                    <form action="{{route('wish_list',['id'=>$value->id])}}" class="wishlist_add" method="POST">
                                                                    @csrf
                                                                <span id="wish2-{{$value->id}}">
                                                                    
                                                                <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productidwish"/>
                                                                </span>
                                                                
                                                                <button style="border:none;background-color:white;"><i class="fa fa-heart-o"style="color:deeppink;background-color:white;" ></i> Thêm Vào WishList</button>
                                                                </form>
                                                            
                                                            </ul>
                                                            <form action="{{route('com_pare',['id'=>$value->id])}}" class="compare_add" method="POST" >
                                                @csrf
                                                <span id="compares2-{{$value->id}}">
                                                <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid"/>
                                                
                                                </span>
                                                <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-6px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>

                                            </form>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Xem Nhanh Sản Phẩm</a></li>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="paginatoin-area">
                                        {!!$productshow->links('giaodien/partials.paginate')!!}
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- shop-products-wrapper end -->