@extends('admin.category.layout')
@section('content')
<div class="container">
<form action="{{route("category.update", $category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
    <div class="form-group">
     <label class="p-edit" for="name">Tên danh mục</label>
     <input type="text" class="form-control input-ggg" name="name" value="{{$category->name}}">
   </div>   
  <div class="form-group">
    <label class="p-edit" for="content">Mô tả:</label>
    <textarea class="form-control input-ggg" id="description" name="description">{{$category->description}}</textarea>
  
  </div>
  <div class="form-group">
    <p class="p-edit" for="image">Hình ảnh củ</p>
    <img src="{{asset('images/'. $category->image)}}" width="320px" height="240px" />
  </div>
  <div class="form-group">    
     <input style="color:#f8b379;" type="file" name="image" id="image" />
  </div>   

  <button type="submit" name="btn_editcategory"class="btn btn-outline-primary btn-block">Thực Hiện</button>
  <div class="form-group">
      <p for="image-new" class="p-edit">Hình ảnh mới</p>
      <div class="container js-file-list"></div> <!--Hiển thị hình ảnh mới-->
  </div>
 </form>
 </div>
 </div>
 
 @stop
