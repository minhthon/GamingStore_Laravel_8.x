@extends('admin.product.layout')
@section('content')
<div class="container">
<form action="{{route("monitor.update", $product->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    @method('PUT')
  
    <p style="text-align:center; color:red; font-size:20px;">{{$product->name}}</p>
    <div class='row'>      
            <p class="p-input">Tên màn hình</p>
            <input name="name" class="input-ggg" placeholder="NAME" value="{{$product->name}}" />

            <p class="p-input">Giá</p>
            <input type="number" name="price" class="input-ggg" placeholder="PRICE" value="{{$product->price}}" />
         
            <p class="p-input">Số lượng</p>
            <input type="number" name="quantity" class="input-ggg" placeholder="QUANTITY" value="{{$des->quantity}}" />
         
            <p class="p-input">Nguồn gốc</p>
            <select class="custom-select" style="border: 2px solid #f8b379;" name="origin" value="{{$des->origin}}"">
              <option>Chính hãng</option>
              <option>Xách tay</option>
            </select>
         
            <p class="p-input">Thời gian bảo hành</p>
            <select class="custom-select" style="border: 2px solid #f8b379;" name="warranty_period" value="{{$des->warranty_period}}">
              <option>12 Tháng</option>
              <option>24 Tháng</option>
              <option>36 Tháng</option>
              <option>5 Năm</option>
            </select>
         
            <p class="p-input">Hảng sản xuất</p>
            <input name="model" class="input-ggg" placeholder="MODEL" value="{{$des->model}}"/>
          
            <p class="p-input">Độ phân giải</p>
            <input name="resoluton" class="input-ggg" placeholder="RESOLUTON" value="{{$des->resoluton}}" />
        
            <p class="p-input">Độ công màn hình</p>
            <input name="screen_curvature" class="input-ggg" placeholder="SCREEN CURVATURE" value="{{$des->screen_curvature}}"/>
         
            <p class="p-input">Độ sáng</p>
            <input name="brightness" class="input-ggg" placeholder="BRIGHTNESS" value="{{$des->brightness}}" />
         
            <p class="p-input">Độ tương phản</p>
            <input name="contrast_ratio_static" class="input-ggg" placeholder="CONTRAST RATIO STATIC" value="{{$des->contrast_ratio_static}}"/>
          
            <p class="p-input">Độ trể</p>
            <input name="response_time" class="input-ggg" placeholder="RESPONSE TIME" value="{{$des->response_time}}"/>

            <p class="p-input">Phân loại</p>
            <select class="custom-select" style="border: 2px solid #f8b379;" name="classify" value="{{$product->classify}}">
            <option>ASUS</option>
             <option>DELL</option>
             <option>SAMSUNG</option>
             <option>MSI</option>
             <option>LG</option>
            </select>
          
          </div>
         
      <div class="container">
      <div class="form-group">
        <p class="p-input">Mô tả:</p>
            <textarea style="border: 2px solid #f8b379;" class="form-control" id="contents" name="content" >{{$des->content}}</textarea>
          <script>CKEDITOR.replace('contents');</script>
      </div>
      <div class="custom-file">
        <p class="p-input">Hình ảnh</p>
        <input type="file" style="margin-bottom:10px; display:block;margin-inline:auto;" name="image" id="image"/>                            
      </div>
         
      <div class="form-group">
    <p class="p-edit" for="image">Hình ảnh củ</p>
    <img src="{{asset('product/'. $product->image)}}" width="320px" height="240px" />
  </div>       
      <input style="margin-top:10px; margin-bottom:10px;" type="submit" value="Lưu lại" class="btn btn-outline-primary btn-block" />
    
      <div class="form-group">
      <p class=p-edit>Hình ảnh mới</p>
        <div style="margin-top:20px" class="container js-file-list"></div> <!-- Hiển thị hình ảnh được chọn  -->  
      </div>
    </div><!--Ket thuc cua class row-->
      </form>   <!--Ket thuc cua form-->  
    </class>    
  </div>
        <!--/.Content-->
 
  </div>
 </form>
 </div>
 </div>

 @stop
