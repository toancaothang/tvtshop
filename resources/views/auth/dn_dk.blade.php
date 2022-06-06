@extends('layout/header_footer')
@section('main')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">Đăng Nhập - Đăng Ký</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="#" >
                                <div class="login-form">
                                    <h4 class="login-title">Đăng Nhập</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Forgotten pasward?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="register-button mt-0">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="{{route('xuly_dangky')}}" method="POST">
                            @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Đăng Ký</h4>
                                    @if (session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
					@endif
					@if($errors)
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger">{{ $error }}</div>
						@endforeach
					@endif
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Họ Tên</label>
                                            <input class="mb-0" type="text" placeholder="Họ tên" name="ten"> 
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tên Tài Khoản</label>
                                            <input class="mb-0" type="text" placeholder="Tên tài khoản"name="tentk">
                                            @if($errors->has('tentk'))
                    		<span>{{$errors->first('tentk')}}</span>
               			@endif
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Số Điện Thoại</label>
                                            <input class="mb-0" type="text" placeholder="Số Điện Thoại" name="sdt">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Địa Chỉ</label>
                                            <input class="mb-0" type="text" placeholder="Địa Chỉ" name="diachi">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Địa Chỉ Email</label>
                                            <input class="mb-0" type="email" placeholder="Email" name="email">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Ngaỳ Sinh</label>
                                            <input class="mb-0" type="text" placeholder="Ngày Sinh" name="ngaysinh">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Mật Khẩu</label>
                                            <input class="mb-0" type="password" placeholder="Mật khẩu" name="matkhau">
                                        </div>
                                        <input type="radio" id="sex" name="gioitinh" value="1" />Nữ
<input type="radio" id="sex" name="gioitinh" value="0" />Nam
                                    
                                        <div class="col-12">
                                            <button class="register-button mt-0">Đăng Ký</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
    
@stop()