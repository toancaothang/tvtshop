@extends('layout/header_footer')
@section('main')

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-6 col-md-12"> 
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                            @if(Auth::check())
                                                                <div class="m-b-25">
                                                                    <img src="{{url('users/')}}/{{Auth::user()->avatar}}" class="img-radius" alt="User-Profile-Image">
                                                                </div>
                                                                @endif
                                                                @if(Auth::check())
                                                                <h6 class="f-w-600">{{Auth::user()->full_name}}</h6>
                                                                @endif
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông Tin Khách Hàng</h6>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Tên Tài Khoản</p>
                                                                        @if(Auth::check())
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->username}}</h6>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Mật Khẩu</p>
                                                                        @if(Auth::check())
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->password}}</h6>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Ngày Sinh</p>
                                                                        @if(Auth::check())
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->birth}}</h6>
                                                                        @endif
                                                                    </div>
                                                                                           
                                                                  
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Thông Tin Liên Hệ</h6>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        @if(Auth::check())
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->email}}</h6>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Số Điện Thoại</p>
                                                                        @if(Auth::check())
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->phone_number}}</h6>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Địa Chỉ</p>
                                                                        @if(Auth::check())
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->address}}</h6>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                               
                                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>
    
@stop()