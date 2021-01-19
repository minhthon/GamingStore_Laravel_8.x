
@extends('FrontEnd.layout')
@section('title','cart')
@section('content')<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- user-login-area-start -->
<div class="user-login-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-title text-center mb-30">
                    <h2 style="color:#f8b379;">Đăng nhập</h2>
                        <p>Đăng nhập vào hệ thống của chúng tôi</p>
                </div>
            </div>
            <form action="{{ route('UserLogin') }}"  method="POST">
            {{ csrf_field() }}
                <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-form" style="border: 2px solid #f8b379;">
                        <div class="single-login">
                            <label>Email<span>*</span></label>
                            <input style="border: 2px solid #f8b379; " type="email" name="email" placeholder="EMAIL" />
                        </div>
                        <div class="single-login">
                            <label>Mật khẩu <span>*</span></label>
                            <input style="border: 2px solid #f8b379;" type="password" name="password"  placeholder="PASSWORD"/>
                        </div>
                        <div class="single-login single-login-2">
                        <button type="submit" class="btn btn-primary btn-block">Log in</button>
                            <input id="remember_me" type="checkbox" name="remember_me" value="forever">
                            <span>Ghi nhớ mật khẩu</span>
                        </div>
                        <a href="#">Quên mật khẩu?</a>
                        <a href="register">Đăng kí</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- user-login-area-end -->
@stop