@extends('admin.user.layout')
@section('content')
  <div class="container"> 
  <a href="index" class="btn btn-outline-primary btn-block">Trở về danh sách tài khoản</a>

         <form action="{{route('user.post_add')}}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
          <div class="form-group">
            <label class="p-edit" for="name">Họ Tên</label>
            <input class="input-ggg" type="text" class="form-control" id="name" name="name">
          </div>
           <div class="form-group">
            <label class="p-edit" for="email">Email</label>
            <input class="input-ggg"  type="email" class="form-control" id="email" name="email">
          </div>
          <div class="p-edit" class="form-group">
            <label for="pwd">Mật khẩu</label>
            <input class="input-ggg"  type="password" class="form-control" id="pwd" name="password">
          </div>
          <div class="p-edit" class="form-group">
            <label for="pwd">Nhập lại mật khẩu</label>
            <input class="input-ggg"  type="password" class="form-control" id="pwd" name="re_password">
          </div>
          <div class="custom-file">
        
            <p class="p-edit">Chọn ảnh đại diện</p>
            <input type="file" style="margin-bottom:10px; display:block;margin-inline:auto;" name="image" id="image" />                            
          </div>
          <input style="margin-top:10px; margin-bottom:10px;" type="submit" value="Tạo mới" class="btn btn-outline-primary btn-block" />   
          
          <div style="margin-top:20px" class="container js-file-list"></div> <!-- Hiển thị hình ảnh được chọn  -->  

    </form>
        </div>
        </div>
	</div>
@stop