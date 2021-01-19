
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
            <h3>Xin chào:<?php echo $user->name; ?></h3>
            </div>
            <div class="form">
                <p style="font-size:20px; color:#f07c29; text-align:center;">Chi tiết đơn hàng</p>
                <table class="table table-hover">
                    <thead>               
                        <th>Hình ảnh</th>
                        <!-- Đang xử lý 0, đang giao là 1, thành công là 2 -->
                        <th>Tên sản phẩm</th>              
                        <th>Đơn giá</th>  
                        <th>Số lượng</th>              
                    
                    </thead>
                    <tbody>
                
                    @foreach ($cart as $id => $cart)          
                    <tr>            
                    <td><img src="{{ asset('product/'.$cart['image']) }}" width="100" height="100" class="img-responsive"/></td>                       
                        <td><h4 class="nomargin">{{ $cart['name'] }}</h4></td>                                  
                        <td >${{ $cart['price'] }}</td>
                        <td data-th="Quantity">
                            <h4>{{ $cart['quantity'] }}</h4>
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ number_format($cart['price'] * $cart['quantity']) }}</td>               
                        
                    </tr>
                    
                    @endforeach
                    <a style="color:white;font-size:25px;"  href="{{asset('/other')}}">Trở về đơn hàng của bạn<i class="zmdi zmdi-arrow-right" > </i></a><br>
                  
                    </tbody>
                </table>
            </div>
         
		</div>		
	</body>
</html>