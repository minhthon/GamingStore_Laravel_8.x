@extends('admin.product.layout')
@section('content')
<div class="container">
<a href="{{route("pc.index")}}" class="btn btn-outline-primary btn-block ">Trở về danh sách PC</a>

<form action="{{route("pc.update", $product->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    @method('PUT')
  
    <p style="text-align:center; color:red; font-size:20px;">{{$product->name}}</p>

        <div class='row'>      
      <div class="col-sm-6">
       
            <p class="p-edit">Tên PC</p>
            <input name="name" class="input-ggg" placeholder="NAME" value="{{$product->name}}" />
        
          
         
            <p class="p-edit">Số lượng</p>
            <input name="quantity" class="input-ggg" placeholder="QUANTITY" value="{{$des->quantity}}" />
         
           
            <p class="p-edit">CPU</p>
            <input name="cpu" class="input-ggg" placeholder="CPU" value="{{$des->cpu}}"/>
          
            <p class="p-edit">RAM</p>
            <input name="ram" class="input-ggg" placeholder="RAM" value="{{$des->ram}}" />
        
            <p class="p-edit">VGA</p>
            <input name="vga" class="input-ggg" placeholder="VGA" value="{{$des->vga}}"/>
         
            <p class="p-edit">HDD</p>
            <input name="hdd" class="input-ggg" placeholder="HDD" value="{{$des->hdd}}"/>
         
            <p class="p-edit">SSD</p>
            <input name="ssd" class="input-ggg" placeholder="SSD" value="{{$des->ssd}}"/>
          
          
         
      </div><!--End col-sm-6 left-->
      <div class="col-sm-6"><!--Mở đầu phần bên phải--->
             <p class="p-edit">Giá</p>
            <input name="price" class="input-ggg" placeholder="PRICE" value="{{$product->price}}" />
         
        
            <p class="p-edit">Case - Vỏ máy tính</p>
            <input name="case" class="input-ggg" placeholder="CASE" value="{{$des->case}}"/>
         
            <p class="p-edit">Tản nhiệt</p>
            <input name="cooling" class="input-ggg" placeholder="COOLING" value="{{$des->cooling}}"/>
        
            <p class="p-edit">Nguồn gốc</p>
            <select class="custom-select select" style="border: 2px solid #f8b379;"  name="origin" value="{{$des->origin}}">
              <option>Chính hãng</option>
              <option>Xách tay</option>
            </select>
         
            <p class="p-edit">Thời gian bảo hành</p>
            <select class="custom-select select" style="border: 2px solid #f8b379;"  name="warranty_period" value="{{$des->warranty_period}}">
              <option>12 Tháng</option>
              <option>24 Tháng</option>
              <option>36 Tháng</option>
              <option>5 Năm</option>
            </select>
            <p class="p-edit">Phân loại</p>
            <select class="custom-select select" style="border: 2px solid #f8b379;"  name="classify"value="{{$product->classify}}">
              <option>PC Gaming</option>
              <option>PC Văn Phòng</option>
              <option>PC Workstation</option>
            </select>
          
            <div class="form-group">
            <p class="p-edit">Danh mục</p>
      
      </div>
              
      </div>  <!--Kết thúc phần bên phải-->
      <div class="container">
      <div class="form-group">
        <p class="p-edit">Mô tả</p>
            <textarea style="border: 2px solid #f8b379;"  class="form-control" id="contents" name="content" >{{$des->content}} </textarea>
          <script>CKEDITOR.replace('contents');</script>
      </div>
      <div class="custom-file">
        <p class="p-edit">Hình ảnh</p>
        <input type="file" style="margin-bottom:10px" name="image" id="image"  />                            
      </div>
              
      <input style="margin-top:10px; margin-bottom:10px;" type="submit" value="Lưu lại" class="btn btn-outline-primary btn-block" />

      <div class="form-group">
    <p class="p-edit" for="image">Hình ảnh củ</p>
    <img src="{{asset('product/'. $product->image)}}" width="320px" height="240px" />
  </div>  
  
  <div class="form-group">
      <p for="image-new" class="p-edit">Hình ảnh mới</p>
      <div class="container js-file-list"></div> <!--Hiển thị hình ảnh mới-->
      </div>
    </div><!--Ket thuc cua class row-->
  
  </div>
 </form>
 </div>
 </div>

 @stop
