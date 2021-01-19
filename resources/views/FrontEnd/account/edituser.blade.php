
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $user->name; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{!!asset('form/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')!!}">
		
		<!-- STYLE CSS -->
        <link rel="stylesheet" href="{!!asset('form/css/style.css')!!}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

	</head>

	<body>
		<div class="wrapper">
			<div class="inner">
            <form action="{{route('user.post_edit',$user->id)}}" method="POST" enctype="multipart/form-data" id="upload">
            {{ csrf_field() }}
                    <h3>Xin chào: <?php echo $user->name; ?></h3>
                    <h3>Email của bạn là: <?php echo $user->email; ?></h3>
					<label class="form-group">
						<input type="text" name="name" id="name" value="{{$user->name }}" class="form-control"  required>
						<span>Họ tên của bạn</span>
						<span class="border"></span>
					</label>
					<label class="form-group">
						<input type="password" name="password" id="password" class="form-control"  >
						<span for="">Mật khẩu</span>
						<span class="border"></span>
					</label>
					<label class="form-group" >
						<input type="password" name="re_password" id="re_password" class="form-control" ></input>
						<span for="">Nhập lại mật khẩu</span>
						<span class="border"></span>
                    </label>
                    <div class="custom-file">
            <p class="p-edit">Ảnh đại diện củ</p>
            <img class="img-responsive" style="margin-left:222px" src="{{asset('image/user/'. $user->image)}}" width="100" />
            <p class="p-edit">Chọn ảnh đại diện( Không chọn thì ảnh đại diện sẽ không thay đổi)</p>
            <input type="file" style="margin-bottom:10px; display:block;margin-inline:auto;" name="image" id="image" />                            
          </div>
         
					<button id="edit">Thực hiện 
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body>
</html>

<script>
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
<script src="{!! asset('admin/js/upload.min.js') !!}"></script>   
