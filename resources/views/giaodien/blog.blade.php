@extends('layout/header_footer')
@section('main')
 <!-- Begin Li's Breadcrumb Area -->
 <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Blog List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Main Blog Page Area -->
            <div class="li-main-blog-page pt-60 pb-55">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Main Content Area -->
                        @foreach($tintuc as $tt)
                        <div class="col-lg-12">
                            <div class="row li-main-content">
                                <div class="col-lg-12">
                                    <div class="li-blog-single-item pb-30">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="li-blog-banner">
                                                    <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/2.jpg" alt=""></a>
                                                </div>
                                            </div>
                                           <div class="col-lg-6">
                                                <div class="li-blog-content">
                                                    <div class="li-blog-details">
                                                        <h3 class="li-blog-heading pt-xs-25 pt-sm-25"><a href="blog-details-left-sidebar.html">{{$tt->title}}</a></h3>
                                                        <div class="li-blog-meta">
                                                     <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$tt->created_at}}</a>
                                                        </div>
                                                        <p style="   white-space: nowrap;
                                                      background-color: white;
                                                       width: 600px;
                                                     
                                                    overflow: hidden;
                                                   text-overflow: ellipsis;
                                                       ">{{$tt->content}}</p>
                                                        <a class="read-more" href="blog-details-left-sidebar.html">Đọc Tiếp</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Begin Li's Pagination Area -->
                                <div class="col-lg-12">
                                    <div class="li-paginatoin-area text-center pt-25">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="li-pagination-box">
                                                    <li><a class="Previous" href="#">Previous</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a class="Next" href="#">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Pagination End Here Area -->
                            </div>
                        </div>
                        <!-- Li's Main Content Area End Here -->
                        </div>
                </div>
            </div>
            <!-- Li's Main Blog Page Area End Here -->
@stop()