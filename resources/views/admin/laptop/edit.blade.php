@extends('admin.laptop.layout')
@section('content')
<div class="container">
<form action="{{route("laptop.update", $product->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    @method('PUT')
  
    <p style="text-align:center; color:red; font-size:20px;">{{$product->name}}</p>

        <div class='row'>      
      <div class="col-sm-6">
       
            <p class="p-edit">Tên laptop</p>
            <input name="name" class="input-ggg" placeholder="NAME" value="{{$product->name}}" />
        
          
            <p class="p-edit">Giá</p>
            <input name="price" class="input-ggg" placeholder="PRICE" value="{{$product->price}}" />
         
            <p class="p-edit">Số lượng</p>
            <input name="quantity" class="input-ggg" placeholder="QUANTITY" value="{{$des->quantity}}" />
         
           
            <p class="p-edit">CPU</p>
            <input name="cpu" class="input-ggg" placeholder="CPU" value="{{$des->cpu}}"/>
          
            <p class="p-edit">RAM</p>
            <input name="ram" class="input-ggg" placeholder="RAM" value="{{$des->ram}}" />
        
            <p class="p-edit">VGA</p>
            <input name="vga" class="input-ggg" placeholder="VGA" value="{{$des->vga}}"/>
         
            <p class="p-edit">Ổ cứng</p>
            <input name="hard_drive" class="input-ggg" placeholder="HARD DRIVE" value="{{$des->hard_drive}}"/>
         
            <p class="p-edit">Màn hình</p>
            <input name="display" class="input-ggg" placeholder="DISPLAY" value="{{$des->display}}"/>
          
            <p class="p-edit">Nguồn gốc</p>
            <select class="custom-select select" style="border: 2px solid #f8b379;" name="origin" value="{{$des->origin}}">
              <option>Chính hãng</option>
              <option>Xách tay</option>
            </select>
         
            <p class="p-edit">Thời gian bảo hành</p>
            <select class="custom-select select" style="border: 2px solid #f8b379;" name="warranty_period" value="{{$des->warranty_period}}">
              <option>12 Tháng</option>
              <option>24 Tháng</option>
              <option>36 Tháng</option>
              <option>5 Năm</option>
            </select>
         
      </div><!--End col-sm-6 left-->
      <div class="col-sm-6"><!--Mở đầu phần bên phải--->
        
            <p class="p-edit">Cổng kết nối</p>
            <input name="connector" class="input-ggg" placeholder="CONNECTOR" value="{{$des->connector}}"/>
         
            <p class="p-edit">Âm thanh</p>
            <input name="audio" class="input-ggg" placeholder="AUDIO" value="{{$des->audio}}"/>
        
            <p class="p-edit">Wifi</p>
            <input name="wifi" class="input-ggg" placeholder="WIFI" value="{{$des->wifi}}"/>
         
            <p class="p-edit">Bluetooth</p>
            <input name="bluetooth" class="input-ggg" placeholder="BLUETOOTH" value="{{$des->bluetooth}}"/>
          
            <p class="p-edit">Hệ điều hành</p>
            <input name="operating_system" class="input-ggg" placeholder="OPERATING SYSTEM" value="{{$des->operating_system}}"/>
         
            <p class="p-edit">Pin</p>
            <input name="battery" class="input-ggg" placeholder="BATTERY" value="{{$des->battery}}"/>
          
            <p class="p-edit">Cân nặng</p>
            <input name="weight" class="input-ggg" placeholder="WEIGHT" value="{{$des->weight}}"/>
          
            <p class="p-edit">Màu sắc</p>
            <input name="color" class="input-ggg" placeholder="COLOR" value="{{$des->color}}"/>
          
            <p class="p-edit">Kích thước</p>
            <input name="size" class="input-ggg" placeholder="SIZE" value="{{$des->size}}"/>
         
            <p class="p-edit">Phân loại</p>
            <select class="custom-select select" style="border: 2px solid #f8b379;" name="classify" value="{{$product->classify}}">
              <option>Laptop Gaming</option>
              <option>Laptop Văn Phòng</option>
              <option>Laptop Doanh Nhân</option>
            </select>
          
           
              
      </div>  <!--Kết thúc phần bên phải-->
      <div class="container">
      <div class="form-group">
        <p class="p-edit">Mô tả</p>
            <textarea style="border: 2px solid #f8b379;" class="form-control" id="contents" name="content" >{{$des->content}} </textarea>
          <script>CKEDITOR.replace('contents');</script>
      </div>
      <div class="custom-file">
        <p class="p-edit">Hình ảnh</p>
        <input type="file" style="margin-bottom:10px" name="image" id="image"  />                            
      </div>
              
      <input style="margin-top:10px; margin-bottom:10px;" type="submit" value="Thực hiện" class="btn btn-outline-primary btn-block" />

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
