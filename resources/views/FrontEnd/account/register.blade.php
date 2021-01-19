
@extends('FrontEnd.layout')
@section('title','cart')
@section('content')<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="home">Trang chủ</a></li>
                        <li><a href="userlogin" class="active">Đăng nhập</a></li>
                    </ul>
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
                    <h2 style="color:#f8b379;">Đăng kí thành viên</h2>
                       
                </div>
            </div>
            <form action="{{route('Add_User')}}" method="POST" enctype="multipart/form-data" id="register">
           {{ csrf_field() }}
                <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-form" style="border: 2px solid #f8b379;">
                    <div class="single-login">
                            <label>Họ tên<span>*</span></label>
                            <input style="border: 2px solid #f8b379; " type="text" name="name" placeholder="NAME" />
                        </div>
                        <div class="single-login">
                            <label>Email<span>*</span></label>
                            <input style="border: 2px solid #f8b379; " type="email" name="email" placeholder="EMAIL" />
                        </div>
                        <div class="single-login">
                            <label>Mật khẩu <span>*</span></label>
                            <input style="border: 2px solid #f8b379;" type="password" name="password"  id="password" placeholder="PASSWORD"/>
                        </div>
                        <div class="single-login">
                            <label>Nhập lại mật khẩu <span>*</span></label>
                            <input style="border: 2px solid #f8b379;" type="password" name="re_password" id="re_password" placeholder="PASSWORD"/>
                        </div>
                      
                        <div class="single-login">
                            <label>Ảnh đại diện <span>*</span></label>
                            <input type="file" style="margin-bottom:10px; display:block;margin-inline:auto;" name="image" id="image" />                            
                            <div style="margin-top:20px" class="container js-file-list"></div> <!-- Hiển thị hình ảnh được chọn  -->  

                        </div>
                        <div class="single-login single-login-2">
                            <button type="submit" class="btn btn-primary btn-block">Đăng kí</button> 
                            <input id="rememberme" type="checkbox" name="rememberme" value="forever">
                            <span>Ghi nhớ mật khẩu</span>
                        </div>
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- user-login-area-end -->
<script>
  //Script kiểm tra thông tin người dùng nhập vào
  $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");  
$("#register").validate({
    rules: {
      name: {
      required:true,
      minlength:5,
      },
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        validatePassword: true,
        minlength: 8,
      },
      re_password: {
        required: true,
        equalTo: "#password",
        minlength: 8,
       
      }
    },

    messages: {
      name:{
        required: "Vui lòng nhập tên của bạn",
        minlength:"Tên có ít nhất 5 ký tự" 
      },
      
      password: {        
        required: "Vui lòng nhập lại mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 8 ký tự"
      },
      re_password: {
        equalTo: "Mật khẩu không khớp",
        required: "Vui lòng nhập lại mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 8 ký tự"
      },
      email: "Vui lòng nhập địa chỉ email của bạn"
    },

    // submitHandler: function(form) {
    //  form.submit();
    // }
 });
 //kết thúc script kiểm tra thông tin người dùng nhập vào
  </script>

@stop