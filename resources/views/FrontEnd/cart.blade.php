@extends('FrontEnd.layout')
@section('title','cart')
@section('content')   
<div class="container">
<div class="col-sm-8">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Sản phẩm</th>
            <th style="width:10%">Giá</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%" class="text-center">Thành tiền</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ;
        $name_product="";
            $cart=json_encode(session('cart'));
           // echo $cart;
        ?>

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            
                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                            <img src="{{ asset('product/'.$details['image']) }}" width="100" height="100" class="img-responsive"/>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity']) }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-primary btn update-cart" data-id="{{ $id }}"><i class="fas fa-sync-alt"></i></button>
                        <button class="btn btn-danger btn remove-from-cart" data-id="{{ $id }}"><i class="fas fa-trash"></i></button>
                    </td>
                    
                </tr>
                
            @endforeach
        @endif

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Tạm tính {{ number_format($total) }}đ</strong></td>
        </tr>
        <tr>
        
            <td><a href="{{ url('/shop') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
         <td> <?php echo $name_product; ?></td>
            <td class="hidden-xs text-center"><strong>Tổng tiền {{ number_format($total) }}đ</strong></td>
           
        
        </tr>
        </tfoot>
      
       
    </table>    
    </div>   
        <div class="col-sm-4">
        <div class="form-group">
            <form action="addPayment" method="POST">
                {{ csrf_field() }}
                  
                    <div class="form-group">
                    <p>Chọn đơn vị vận chuyển</p>
                    <select class="form-control" name="shipping_unit" id="">
                        <option >Ninja Van</option>
                        <option >Viettel Post</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <p>Phương thức thanh toán</p>
                    <select class="form-control" name="payment_method" id="">
                        <option >Thanh toán khi nhận hàng</option>
                        
                    </select>
                    </div>
                    <?php $a =json_encode(session('cart')) ?>
                  
                    <input type="hidden" name="id_user" value="<?php echo $user->id; ?>">
                    <div class="form-group">
                    <p>Địa chỉ giao hàng</p>
                    <input style="width:350px" type="text" name="address">
                    </div>
                    <div class="form-group">
                    <p>Ghi chú</p>
                    <input style="width:350px" type="text" name="note">
                    </div>
                    <div class="form-group">  
                    <input type="hidden" name="cart" value="<?php echo json_encode(session('cart')); ?>">                 
                    <button style="width:350px" type="submit" class="btn btn-warning">Thanh toán</button>
                    </div>

            </form>            
        </div>
       
        </div>

    </div>  
    <br> 
@endsection

@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Bạn có chắc muốn xóa sản phẩm khỏi giỏ hàng")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection