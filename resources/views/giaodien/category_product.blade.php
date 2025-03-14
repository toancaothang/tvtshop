@extends('layout/header_footer')
@section('main')
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="~/Scripts/jquery.unobtrusive-ajax.min.js"></script>

    <script src="~/Scripts/jquery.validate.js"></script>
    <script src="~/Scripts/jquery.validate.unobtrusive.js"></script> 
</head>
<script >
  $(document).ready(function(){
    $('#sortpro').change(function () {
   var sort=$(this).val();
   var ramvalue=get_ram('.ramvalue');
   var capavalue=get_dungluong('.capavalue');
    var url=$('#url').val();
   
    $.ajax({
url:url,
method:"get",
dataType: "html",
data:{capavalue:capavalue,ramvalue:ramvalue,sort:sort,url:url},
success:function(data){
    $(' .ajaxupdate').html(data);
}
    });

 
}); 
$('.ramvalue').click(function () {
    var sort=$("#sortpro option:selected").text(); 
    var url=$('#url').val();
   var ramvalue=get_ram(this);
   $.ajax({
url:url,
method:"get",
dataType: "html",
data:{ramvalue:ramvalue,sort:sort,url:url},
success:function(data){
    $(' .ajaxupdate').html(data);
}
    });
});
function get_ram(class_name){
    var filter=[];
    $(".ramvalue:checked").each(function(){
filter.push($(this).val());
    });
    return filter;
}
$('.capavalue').click(function () {
    var sort=$("#sortpro option:selected").text(); 
    var url=$('#url').val();
   var capavalue=get_dungluong(this);
   $.ajax({
url:url,
method:"get",
dataType: "html",
data:{capavalue:capavalue,sort:sort,url:url},
success:function(data){
    $('.ajaxupdate').html(data);
}
    });
});
function get_dungluong(class_name){
    var filter=[];
    $(".capavalue:checked").each(function(){
filter.push($(this).val());
    });
    return filter;
}

});
</script>
<!--xu ly slider range price -->
<script >
  $(document).ready(function(){
    $( "#slider-range" ).slider({
        
      range: true,
      min: 0,
      max:5000000,
      values: [ 2000000,5000000 ],
    slide: function( event, ui ) {
        $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - " + ui.values[ 1 ]+"đ" );
        $( "#startprice" ).val( ui.values[ 0 ] );
        $( "#endprice" ).val(ui.values[ 1 ] );
      }
    });

});
</script>
<!--xu ly bien -->
<script>
  $(document).ready(function(){
$('.update-bienthe').click(function(){
 var bienthes=$(this).data("type");
 var produm = $('#produm-' + $(this).data('id') ). change (). val();
 const price=$(this).data('id');
 $.ajax({
    
type:'get',
dataType:'html',
url:'<?php echo url('/selectbienthe');?>',
data: "bienthes="+ bienthes +"&produm="+produm,
success:function (response){
    console.log(response);
    $('#price-'+price).html(response);
    $('#price1-'+price).html(response);
    $('#price2-'+price).html(response);
}
}); 
$.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectwish');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#wish-'+price).html(response); 
        $('#wish1-'+price).html(response); 
        $('#wish2-'+price).html(response); 
    }
    }); 
$.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectsalecate');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#salefix-'+price).html(response); 
        $('#salefix1-'+price).html(response);
        $('#salefix2-'+price).html(response);
    }
    }); 
    $.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectcompare');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#compares-'+price).html(response);
        $('#compares1-'+price).html(response);
        $('#compares2-'+price).html(response);
    }
    }); 
    
});

  });
    </script>
<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>      
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-1 order-lg-2">
                            <!-- Begin Li's Banner Area -->
                            <div class="single-banner shop-page-banner">
                                <a href="#">
                                    <img src="{{asset('images/bg-banner/1.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                            <!-- Li's Banner Area End Here -->
                           <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                             <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <!-- shop-item-filter-list start -->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    <div class="toolbar-amount">
                                        <span>Đang Hiển Thị </span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->
                                
                                <div class="product-select-box">
                                    <div class="product-short">
                                    
                                       <p>Sắp xếp theo:</p>
                                       <form id="softproform">
                                       <select class="nice-select" name="sortpro" id="sortpro">
                                       <option value="">Chọn Sắp Xếp</option>
                                       <option value="toprate" @if(isset($_GET['sortpro']) && $_GET['sortpro']=="toprate") selected="" @endif>Đánh Giá Cao Nhất</option>
                                            <option value="lowtohigh" @if(isset($_GET['sortpro']) && $_GET['sortpro']=="lowtohigh") selected="" @endif >Giá Thấp Đến Cao</option>
                                            <option value="hightolow" @if(isset($_GET['sortpro']) && $_GET['sortpro']=="hightolow") selected="" @endif >Giá Cao Đến Thấp</option>
                                      <option value="lastest" @if(isset($_GET['sortpro']) && $_GET['sortpro']=="lastest") selected="" @endif >Mới Nhất</option>
                                            <option value="old" @if(isset($_GET['sortpro']) && $_GET['sortpro']=="old") selected="" @endif >Cũ Nhât</option>
                                            <input type="hidden"  name="url" id="url"value="{{$id}}"/>
                                        </select>
                                       
                                    </div>
                                    
                                    </form>
                                   
                                </div>
                                
                                
                                <!-- product-select-box end -->
                            </div>
                           
                            <!-- shop-top-bar end -->
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
                                            <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-10px;margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>

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
                                                        <li class="review-item"><a href="#">{{$value->getcomment->count()}}</a></li>
                                                    </ul>
                                                </div>
                                                <form action="{{route('com_pare',['id'=>$value->id])}}" class="compare_add" method="POST" >
                                            @csrf
                                            <span id="compares1-{{$value->id}}">
                                            <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid"/>
                                            
                                            </span>
                                            <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF; font-size:17px; margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" > So Sánh</button>

                                           </form>
                                                <form action="{{route('add_cart',['id'=>$value->id])}}" class="cart-quantity" method="POST" >
                                        @csrf
                                                <div class="price-box pt-20" >
                                                @php $exsale=$value->getpro->first()->sale*$value->getpro->first()->price/100; @endphp
                                                                <span class="new-price new-price-2" id="price1-{{$value->id}}">{{number_format($value->getpro->first()->price-$exsale)}} <u>đ</u>
                                                                <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid"/>
                                                            </span>
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
                                                  
                                                         <div class="quantity">
                                                <label>Số Lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box " value="1" type="text" name="quaninput">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                                        <button class="add-to-cart" type="submit">Thêm Vào Giỏ Hàng</button>
                                                    </form>
                                                </div>
                                                <div class="product-additional-info pt-25">
                                                <form action="{{route('wish_list',['id'=>$value->id])}}" class="wishlist_add" method="POST" >
                                    @csrf
                                    <span id="wish1-{{$value->id}}">
                                    <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productidwish"/>
                                    </span> 
                                    <button class="wishlist-btn" type="submit" style="border:none; background-color:white; color:deeppink; font-size:15px;" > <i class="fa fa-heart-o"></i>Thêm Vào WishList</button>
                                    </form>
                                                    
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
                                            <li style="margin-left:7px;"><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Xem Nhanh Sản Phẩm</a></li>
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
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                            <!--sidebar-categores-box start  -->
                      
                            <!--sidebar-categores-box end  -->
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box">
                                <div class="sidebar-title">
                                    <h2>Lọc Theo</h2>
                                </div>
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area">
                                    <h5 class="filter-sub-titel">Giá Từ:  </h5>
                                    <div class="categori-checkbox">
                                    <form>
                            <p>
                       <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                       <input type="text" id="startprice" name="startprice" >
                       <input type="text" id="endprice"name="endprice" >
                        </p>
 
                        <div id="slider-range"></div><br>
                        
                        <button onclick="send()" type='button'> Click me  </button>
                            </form>
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Ram</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox"class="ramvalue" value="2" name="product-categori"><a href="#">2 GB</a></li>
                                                <li><input type="checkbox"class="ramvalue" value="3" name="product-categori"><a href="#"> 3 GB</a></li>
                                                <li><input type="checkbox"class="ramvalue" value="4" name="product-categori"><a href="#">4 GB</a></li>
                                                <li><input type="checkbox"class="ramvalue" value="6" name="product-categori"><a href="#"> 6 GB</a></li>
                                                <li><input type="checkbox"class="ramvalue" value="8" name="product-categori"><a href="#">8 GB</a></li>
                                                <li><input type="checkbox"class="ramvalue" value="12" name="product-categori"><a href="#"> 12 GB</a></li>
                                                
                                            </ul>
                                            
                                        </form>
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Dung Lượng</h5>
                                    <div class="size-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" class="capavalue" value="8" name="product-size"><a href="#">8 GB</a></li>
                                                <li><input type="checkbox" class="capavalue" value="16" name="product-size"><a href="#">16 GB</a></li>
                                                <li><input type="checkbox" class="capavalue" value="32" name="product-size"><a href="#">32 GB</a></li>
                                                <li><input type="checkbox" class="capavalue" value="64" name="product-size"><a href="#">64 GB</a></li>
                                                <li><input type="checkbox" class="capavalue" value="128" name="product-size"><a href="#">128 GB</a></li>
                                                <li><input type="checkbox" class="capavalue" value="256" name="product-size"><a href="#">256 GB</a></li>
                                                <li><input type="checkbox" class="capavalue" value="512" name="product-size"><a href="#">512 GB</a></li>
                                                
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Màu Sắc</h5>
                                    <div class="color-categoriy">
                                        <form action="#">
                                            <ul>
                                                <li><span class="white"></span><a href="#">Trắng </a></li>
                                                <li><span class="black"></span><a href="#">Đen </a></li>
                                                <li><span class="Orange"></span><a href="#">Vàng  </a></li>
                                                <li><span class="Blue"></span><a href="#">Xanh   </a></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                    
                                <!-- filter-sub-area end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!-- category-sub-menu start -->
                            
                                <!-- category-sub-menu end -->
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function send(){
                    var start=$('#startprice').val();
                    var end=$('#endprice').val();
                    $.ajax({
    
    type:'get',
   url:'product',
    data: "start=" + start + "& end=" + end,
    success:function (response){
        console.log(response)
      $('#updateDiv').html(response);
    }
    }); 
                }
                </script>
    
@stop()