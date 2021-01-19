@extends('admin.category.layout')
@section('content')

<div class="btn-group div-index" role="group" aria-label="Basic example"><!--Đoạn này dùng để hiển thị 2 button điều hướng lên trang index-->
  <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary ">Quản lý</a>
  <a data-toggle="modal" data-target="#elegantModalForm" class="btn btn-success">Thêm mới</a>
</div>
<!-- Mở đầu phần thêm mới -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <class class="modal-content form-elegant">               
      <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="custom-file">
              <p class="p-input">Tên danh mục</p>
              <input name="name" class="input-ggg" placeholder="NAME" />
          </div>
          <div class="custom-file">
            <p class="p-input">Mô tả</p>
            <textarea rows="5" name="description" class="input-ggg" placeholder="DESCRIPTION" ></textarea>
          </div>
          <div class="custom-file">
            <p class="p-input">Hình ảnh</p>
            <input type="file" style="margin-bottom:10px" name="image" id="image" />                            
          </div>
          <div style="margin-top:20px" class="container js-file-list"></div> <!-- Hiển thị hình ảnh được chọn  -->           
            <input style="margin-top:10px; margin-bottom:10px;" type="submit" value="Tạo mới" class="btn btn-outline-primary btn-block" />
        </form>     
      </class>    
  </div>
        <!--/.Content-->
</div>
<!--Kết thúc phần thêm mới-->
<table class="table table-hover">
  <thead>
    <th>Hình ảnh</th>
    <th>Tên danh mục</th>  
    <th>Mô tả</th>
    <th>Chỉnh sửa</th>
    <th>Khóa</th>
    <th>Xóa</th>
  </thead>
  <tbody>
    @foreach($cate ?? '' as $category)
      <tr>
        <td><img src="{{asset('images/'. $category->image)}}" width="40" /></td>
        <td>{{$category->name}} </td>
        <td>{{$category->description}} </td>    
        <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
        <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
        <td>
        <form action="{{route('category.destroy', $category->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td>
       
        </form>
      </tr>
      @endforeach
  </tbody>
</table>
@stop
  