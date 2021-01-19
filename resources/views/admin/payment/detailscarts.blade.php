@extends('admin.laptop.layout')
@section('content')
<div class="container">

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
                    <a style="color:white;font-size:25px;"  href="{{asset('panel/theother')}}">Trở về đơn hàng của bạn<i class="zmdi zmdi-arrow-right" > </i></a><br>
                  
                    </tbody>
                </table>
            </div>
            </div>
            @stop