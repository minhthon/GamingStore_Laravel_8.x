@extends('admin.product.layout')
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
      <form action="{{route('monitor.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <p style="text-align:center; color:white;font-size:20px">THÊM product</p>
        <div class="form-group">
            
   
            <p class="p-input">Tên màn hình</p>
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
         
            <p class="p-input">Hảng sản xuất</p>
            <input name="model" class="input-ggg" placeholder="MODEL" />
          
            <p class="p-input">Độ phân giải</p>
            <input name="resoluton" class="input-ggg" placeholder="RESOLUTON" />
        
            <p class="p-input">Độ công màn hình</p>
            <input name="screen_curvature" class="input-ggg" placeholder="SCREEN CURVATURE" />
         
            <p class="p-input">Độ sáng</p>
            <input name="brightness" class="input-ggg" placeholder="BRIGHTNESS" />
         
            <p class="p-input">Độ tương phản</p>
            <input name="contrast_ratio_static" class="input-ggg" placeholder="CONTRAST RATIO STATIC" />
          
            <p class="p-input">Độ trể</p>
            <input name="response_time" class="input-ggg" placeholder="RESPONSE TIME" />

            <p class="p-input">Phân loại</p>
            <select class="custom-select" style="background-color:#fff;" name="classify">
             <option>ASUS</option>
             <option>DELL</option>
             <option>SAMSUNG</option>
             <option>MSI</option>
             <option>LG</option>
            </select>
          
          </div>
          <div class="form-group">
      
    
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
<!-- Model bootstrap delete Monitor -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa màn hình</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Bạn có chắc là mình muốn xóa màn hình này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="deleteProduct" type="button" class="btn btn-primary">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 <!-- Kết thúc model bootstrap delete Monitor -->
<!-- Model bootstrap khóa Monitor -->
<div class="modal fade" id="lock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận khóa màn hình</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Bạn có chắc là mình muốn khóa màn hình này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="lockMonitor" type="button" class="btn btn-primary">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 <!-- Kết thúc model bootstrap  khóa Monitor-->
<table class="table table-hover">
  <thead>
    <th>Hình ảnh</th>
    <th>Tên product</th>   
    <th>Chỉnh sửa</th>
    <th>Chi tiết</th>
    <th>Khóa</th>
    <th>Xóa</th>
  </thead>
  <tbody>
  @foreach($product ?? '' as $product)
      <tr>
        <td><img src="{{asset('product/'. $product->image)}}" width="40" /></td>
        <td>{{$product->name}} </td>       
      
        <td><a href="{{route('monitor.edit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
        <td><a href="{{route('monitor.show', $product->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a></td>
        <td><a  class="btn btn-danger"><i class="fa fa-lock lock" id="<?php echo $product->id ?>" data-toggle="modal" data-target="#lock"></i></a></td>
        <td><a  class="btn btn-danger"><i class="fa fa-trash remove" id="<?php echo $product->id ?>" data-toggle="modal" data-target="#exampleModal"></i></a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<!-- Đoạn script lấy thông tin từ bảng -->
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
            alert ("Xóa màn hình thành công");  
            location.reload()  ;  
          };
        }
     })
   });
  });
});
  </script>

  <!-- Đoạn script khóa Monitor -->
 <script>
    $(function () {
  $('.lock').click(function (e) {
    e.preventDefault();
    var id_lock = $(this).attr('id');
 
   $('#lockMonitor').click(function(e){  
     $.ajax({       
        url: "lockMonitor/"+id_lock,
        cache:false,
        success :function(data){
          if(data.trim()=="SUCCESS"){           
            // $(this).closest('tr.delete_row').remove();    
            alert ("Khóa màn hình thành công");  
            location.reload()  ;  
          };
        }
     })
   });
  });
});
  </script>
  <!-- kết thúc đoạn script khóa Monitor -->
@stop
  