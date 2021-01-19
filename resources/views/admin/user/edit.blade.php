@extends('admin.user.layout')
@section('content')
<div class="container">
  <p class="p-edit">Chỉnh sửa thông tin cho tài khoản {{$user->email}} </p>
  <form action="{{route('user.post_edit',$user->id)}}" method="POST" enctype="multipart/form-data" id="upload">
           {{ csrf_field() }}
           <div class="form-group">
            <label class="p-edit" for="name">Họ Tên</label>
            <input class="input-ggg" type="text" class="form-control" id="name" name="name" value="{{$user->name}}" >
          </div>         
          <div class="p-edit" class="form-group">
            <label for="pwd">Mật khẩu</label>
            <input class="input-ggg"  type="password" class="form-control" id="password" name="password" >
          </div>
          <div class="p-edit" class="form-group">
            <label for="pwd">Nhập lại mật khẩu</label>
            <input class="input-ggg"  type="password" class="form-control" id="re_password" name="re_password">
          </div>         
          <div class="custom-file">
            <p class="p-edit">Ảnh đại diện củ</p>
            <td><img src="{{asset('uploads/user/'. $user->image)}}" width="200" /></td>
            <p class="p-edit">Chọn ảnh đại diện( Không chọn thì ảnh đại diện sẽ không thay đổi)</p>
            <input type="file" style="margin-bottom:10px; display:block;margin-inline:auto;" name="image" id="image" />                            
          </div>
          <input style="margin-top:10px; margin-bottom:10px;" type="submit" value="Thực hiện" class="btn btn-outline-primary btn-block" />   
          <div class="form-group">
          <p class="p-edit">Ảnh đại diện mới</p>
            <div style="margin-top:20px" class="container js-file-list"></div> <!-- Hiển thị hình ảnh được chọn  --> 
          </div> 
  </form>
</div>

<script>
//Script kiểm tra thông tin người dùng nhập vào
  $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");  
$("#upload").validate({
    rules: {
      name: {
      required:true,
      minlength:5,
      },    
      password: {      
        validatePassword: true,
      
      },
      re_password: {      
        equalTo: "#password",
          
      }
    },

    messages: {
      name:{
        required: "Vui lòng nhập tên của bạn",
        minlength:"Tên có ít nhất 5 ký tự" ,
      },      
      password: {       
        minlength: "Mật khẩu phải có ít nhất 8 ký tự",
      },
      re_password: {
        equalTo: "Mật khẩu không khớp",       
        minlength: "Mật khẩu phải có ít nhất 8 ký tự",
      },
     
    },

    submitHandler: function(form) {
     form.submit();
    }
 });
 //kết thúc script kiểm tra thông tin người dùng nhập vào
  </script>


<@stop