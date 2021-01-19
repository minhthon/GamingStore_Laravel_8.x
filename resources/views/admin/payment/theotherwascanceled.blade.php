@extends('admin.laptop.layout')
@section('content')
<div class="container">

        </div>
        <div class="form">
            <p style="font-size:20px; color:#f07c29; text-align:center;">Các đơn hàng đã được hủy</p>
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
                <td><a href="detailscarts/<?php echo $other->id; ?>">Xem thông tin</a></td>
                
                </tr>
                @endforeach

            </tbody>
            </table>
            </div>
            </div>
@stop