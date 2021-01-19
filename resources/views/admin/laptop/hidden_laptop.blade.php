@extends('admin.laptop.layout')
@section('content')

<div class="btn-group div-index" role="group" aria-label="Basic example"><!--Đoạn này dùng để hiển thị 2 button điều hướng lên trang index-->
  <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary ">Quản lý</a>
  <a data-toggle="modal" data-target="#elegantModalForm" class="btn btn-success">Thêm mới</a>
</div>
<!-- Mở đầu phần thêm mới -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:1080px">
    <!--Content-->
    <class class="modal-content form-elegant">               
      <form action="{{route('laptop.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <p style="text-align:center; color:white;font-size:20px">THÊM Laptop</p>
        <div class='row'>
      <div class="col-sm-6">
       
            <p class="p-input">Tên product</p>
            <input name="name" class="input-ggg" placeholder="NAME" />
        
          
            <p class="p-input">Giá</p>
            <input type="number" name="price" class="input-ggg" placeholder="PRICE" />
         
            <p class="p-input">Số lượng</p>
            <input type="number" name="quantity" class="input-ggg" placeholder="QUANTITY" />
         
            <p class="p-input">Nguồn gốc</p>
            <select class="custom-select" style="background-color:#fff;" name="origin">
              <option>Chính hãng</option>
              <option>Xách tay</option>
            </select>
         
            <p class="p-input">Thời gian bảo hành</p>
            <select class="custom-select" style="background-color:#fff;" name="warranty_period">
              <option>12 Tháng</option>
              <option>24 Tháng</option>
              <option>36 Tháng</option>
              <option>5 Năm</option>
            </select>
         
            <p class="p-input">CPU</p>
            <input name="cpu" class="input-ggg" placeholder="CPU" />
          
            <p class="p-input">RAM</p>
            <input name="ram" class="input-ggg" placeholder="RAM" />
        
            <p class="p-input">VGA</p>
            <input name="vga" class="input-ggg" placeholder="VGA" />
         
            <p class="p-input">Ổ cứng</p>
            <input name="hard_drive" class="input-ggg" placeholder="HARD DRIVE" />
         
            <p class="p-input">Màn hình</p>
            <input name="display" class="input-ggg" placeholder="DISPLAY" />
          
      </div><!--End col-sm-6 left-->
      <div class="col-sm-6"><!--Mở đầu phần bên phải--->
        
            <p class="p-input">Cổng kết nối</p>
            <input name="connector" class="input-ggg" placeholder="CONNECTOR" />
         
            <p class="p-input">Âm thanh</p>
            <input name="audio" class="input-ggg" placeholder="AUDIO" />
        
            <p class="p-input">Wifi</p>
            <input name="wifi" class="input-ggg" placeholder="WIFI" />
         
            <p class="p-input">Bluetooth</p>
            <input name="bluetooth" class="input-ggg" placeholder="BLUETOOTH" />
          
            <p class="p-input">Hệ điều hành</p>
            <input name="operating_system" class="input-ggg" placeholder="OPERATING SYSTEM" />
         
            <p class="p-input">Pin</p>
            <input name="battery" class="input-ggg" placeholder="BATTERY" />
          
            <p class="p-input">Cân nặng</p>
            <input name="weight" class="input-ggg" placeholder="WEIGHT" />
          
            <p class="p-input">Màu sắc</p>
            <input name="color" class="input-ggg" placeholder="COLOR" />
          
            <p class="p-input">Kích thước</p>
            <input name="size" class="input-ggg" placeholder="SIZE" />
         
            <p class="p-input">Phân loại</p>
            <select class="custom-select" style="background-color:#fff;" name="classify">
              <option>Laptop Gaming</option>
              <option>Laptop Văn Phòng</option>
              <option>Laptop Doanh Nhân</option>
            </select>
          
           
              
      </div>  <!--Kết thúc phần bên phải-->
      <div class="container">
      <div class="form-group">
        <p class="p-input">Mô tả:</p>
            <textarea style="border: 2px solid #f8b379;" class="form-control" id="contents" name="content"></textarea>
          <script>CKEDITOR.replace('contents');</script>
      </div>
      <div class="custom-file">
        <p class="p-input">Hình ảnh</p>
        <input type="file" style="margin-bottom:10px; display:block;margin-inline:auto;" name="image" id="image" multiple/>                            
      </div>
              
      <input style="margin-top:10px; margin-bottom:10px;" type="submit" value="Tạo mới" class="btn btn-outline-primary btn-block" />
      <div style="margin-top:20px" class="container js-file-list"></div> <!-- Hiển thị hình ảnh được chọn  -->  
      </div>
    </div><!--Ket thuc cua class row-->
      </form>   <!--Ket thuc cua form-->  
    </class>    
  </div>
        <!--/.Content-->
</div>
<!--Kết thúc phần thêm mới-->


<!-- Model bootstrap delete laptop -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa laptop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Bạn có chắc là mình muốn xóa laptop này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="deleteProduct" type="button" class="btn btn-primary">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 <!-- Kết thúc model bootstrap delete laptop -->
<!-- Model bootstrap khóa laptop -->
<div class="modal fade" id="unlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận mở khóa laptop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Bạn có chắc là mình muốn mở khóa laptop này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="unlockLaptop" type="button" class="btn btn-primary">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 <!-- Kết thúc model bootstrap  khóa laptop-->
<p class="p-edit">Danh sách Laptop đang bị ẩn khỏi hệ thống</p>
<table class="table table-hover">
  <thead>
    <th>Hình ảnh</th>
    <th>Tên product</th>   
    <th>Chỉnh sửa</th>
    <th>Chi tiết</th>
    <th>Mở Khóa</th>
    <th>Xóa</th>
  </thead>
  <tbody>
  @foreach($product ?? '' as $product)
      <tr>
        <td><img src="{{asset('product/'. $product->image)}}" width="40" /></td>
        <td>{{$product->name}} </td>             
        <td><a href="{{route('laptop.edit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
        <td><a href="{{route('laptop.show', $product->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a></td>
        <td><a  class="btn btn-danger"><i class="fa fa-lock unlock" id="<?php echo $product->id ?>" data-toggle="modal" data-target="#unlock"></i></a></td>
        <td><a  class="btn btn-danger"><i class="fa fa-trash remove" id="<?php echo $product->id ?>" data-toggle="modal" data-target="#exampleModal"></i></a></td>
       
      </tr>
      @endforeach
  </tbody>
</table>
<script>
    $(function () {
  $('.remove').click(function (e) {
    e.preventDefault();
    var id_product = $(this).attr('id');
    console.log(id_product);
   $('#deleteProduct').click(function(e){  
     $.ajax({       
        url: "destroy/"+id_product,
        cache:false,
        success :function(data){
          if(data.trim()=="SUCCESS"){           
            // $(this).closest('tr.delete_row').remove();    
            alert ("Xóa laptop thành công");  
            location.reload()  ;  
          };
        }
     })
   });
  });
});
  </script>

  <!-- Đoạn script khóa laptop -->
 <script>
    $(function () {
  $('.unlock').click(function (e) {
    e.preventDefault();
    var id_lock = $(this).attr('id');
 
   $('#unlockLaptop').click(function(e){  
     $.ajax({       
        url: "unlockLaptop/"+id_lock,
        cache:false,
        success :function(data){
          if(data.trim()=="SUCCESS"){           
            // $(this).closest('tr.delete_row').remove();    
            alert ("Mở khóa laptop thành công");  
            location.reload()  ;  
          };
        }
     })
   });
  });
});
  </script>
@stop
  