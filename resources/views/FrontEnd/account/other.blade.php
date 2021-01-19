
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
            <p style="font-size:20px; color:#f07c29; text-align:center;">Đây là các đơn hàng của bạn</p>
            <table class="table table-hover">
            <thead>
               
                <th>Phương thức thanh toán</th>
                <th>Địa chỉ</th>
                <th>Đơn vị vận chuyển</th>
                <th>Ghi chú</th>
                <!-- Đang xử lý 0, đang giao là 1, thành công là 2 -->
                <th>Trạng thái</th> 
                <th>Ngày đặt</th>
                <th>Xem thông tin đơn hàng</th>
                <th>Hủy đơn hàng</th>
            </thead>
            <tbody>
            @foreach($other ?? '' as $other)
                <tr>
                
                    <td>{{$other->payment_method}}</td>
                    <td>{{$other->address}}</td>
                    <td>{{$other->shipping_unit}}</td>
                    <td>{{$other->note}}</td>
                    <?php
                    if($other->status==0){?>
                        <td>Đang xử lý</td>
                <?php } ?>
                <?php
                    if($other->status==1){?>
                        <td>Đang giao</td>
                <?php } ?>
                
                <?php
                    if($other->status==2){?>
                        <td>Đã hoàn thành</td>
                <?php } ?>

                <?php
                    if($other->status==4){?>
                        <td>Đã hủy</td>
                <?php } ?>
                <td>{{$other->updated_at}}</td>
                <td><a href="detailscart/<?php echo $other->id; ?>">Xem thông tin</a></td>
                <td><a href="otherdestroy/<?php echo $other->id; ?>">Hủy đơn hàng</a></td>
                </tr>
                @endforeach

            </tbody>
            </table>
            </div>
         
		</div>		
	</body>
</html>