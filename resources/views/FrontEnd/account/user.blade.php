
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

	</head>

	<body>
		<div class="wrapper">
			<div class="inner">
				<form action="">
					<h3>Xin chào:<?php echo $user->name; ?></h3>
					<p>Thông tin cá nhân</p>
					<label class="form-group">
						<p><?php echo $user->name;?></p>
						<span>Tên của bạn</span>
						<span class="border"></span>
					</label>
					<label class="form-group">
                    <p><?php echo $user->email;?></p>
						<span for="">Email của bạn</span>
						<span class="border"></span>
					</label>
					<label class="form-group" >
						<img src="{{asset('image/user/'.$user->image)}}"  class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
					
						<span class="border"></span>
                    </label>
                   
                    <a style="color:white;font-size:25px;"  href="edituser/<?php echo $user->id; ?>">Thay đổi thông tin<i class="zmdi zmdi-arrow-right" > </i></a><br>

                    <a style="color:white;font-size:25px;"  href="{{asset('/')}}">Trở về trang chủ <i class="zmdi zmdi-arrow-right" > </i></a><br>
					<a style="color:white;font-size:25px;"  href="{{asset('/other')}}">Đơn hàng của tôi <i class="zmdi zmdi-arrow-right" > </i></a>
				</form>
			</div>
		</div>
		
	</body>
</html>
