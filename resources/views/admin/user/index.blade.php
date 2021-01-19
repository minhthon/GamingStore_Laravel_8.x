@extends('admin.user.layout')
@section('content')

<div class="btn-group div-index" role="group" aria-label="Basic example"><!--Đoạn này dùng để hiển thị 2 button điều hướng lên trang index-->
  <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary ">Quản lý</a>
  <a data-toggle="modal" data-target="#elegantModalForm" class="btn btn-success">Thêm mới</a>
</div>
<!-- Mở đầu phần thêm mới user-->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <class class="modal-content form-elegant"> 
    <form action="" enctype="multipart/form-data" method="post" id="upload">             
   {{csrf_field()}}
          <div class="form-group">
            <label class="p-input" for="name">Họ Tên</label>
            <input class="input-ggg" type="text" class="form-control" id="name" name="name">
          </div>
           <div class="form-group">
            <label class="p-input" for="email">Email</label>
            <input class="input-ggg"  type="email" class="form-control" id="email" name="email">
          </div>
          <div class="p-input" class="form-group">
            <label for="pwd">Mật khẩu</label>
            <input class="input-ggg"  type="password" class="form-control" id="password" name="password">
          </div>
          <div class="p-input" class="form-group">
            <label for="pwd">Nhập lại mật khẩu</label>
            <input class="input-ggg"  type="password" class="form-control" id="re_password" name="re_password">
          </div>
          <div class="form-group">
          <label for="image 1">Image 1</label>
                    <input type="file" name="files"  class="selectImage" id="images"/>
                    <div class="show-progress">

                          
                    </div>
                </div>

          <button type="submit"  id="uploadImage" style="margin-top:10px; margin-bottom:10px;"  value="Tạo mới" class="btn btn-outline-primary btn-block btn-add" >ADD USER</button> 
          </form>
       <!-- //  <div class="row justify-content-center" id="showImage"> -->

      </class>    
  </div>
        <!--/.Content-->
</div>
<!--Kết thúc phần thêm mới user-->
 <!-- Model bootstrap delete user -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Bạn có chắc là mình muốn xóa tài khoản này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="deleteUser" type="button" class="btn btn-primary">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 <!-- Kết thúc model bootstrap delete user -->
<!-- Model bootstrap khóa user -->
<div class="modal fade" id="lock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận khóa tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Bạn có chắc là mình muốn khóa tài khoản này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="lockUser" type="button" class="btn btn-primary">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 <!-- Kết thúc model bootstrap  khóa user-->
<table class="table table-hover table">
      <thead>
        <th>Name</th>
        <th>Email</th>
        <th >Ảnh đại diện</th>        
        <th>Chỉnh sửa</th>
        <th>Khóa</th>
        <th>Xóa</th>
      </thead>
      <tbody class= "tbody">
        @foreach($users ?? '' as $user)
          <tr class="delete_row" >
            <td>{{$user->name}} </td>
            <td>{{$user->email}} </td>
            <td><img src="{{asset('image/user/'. $user->image)}}" width="40" /></td>
           
            <td><a  href="{{route('user.get_edit',$user->id)}}" class="btn btn-primary"><i class="fa fa-edit "></i></a></td>
            <td><a  class="btn btn-danger"><i class="fa fa-lock lock" id="<?php echo $user->id ?>" data-toggle="modal" data-target="#lock"></i></a></td>

            <td><a  class="btn btn-danger"><i class="fa fa-trash remove" id="<?php echo $user->id?>" data-toggle="modal" data-target="#exampleModal"></i></a></td>
          </tr>
        @endforeach
      </tbody>
      </div>
  </table>
<!-- Đoạn script khóa user -->
<script>
    $(function () {
  $('.lock').click(function (e) {
    e.preventDefault();
    var id_lock = $(this).attr('id');
 
   $('#lockUser').click(function(e){  
     $.ajax({       
        url: "lockUser/"+id_lock,
        cache:false,
        success :function(data){
          if(data.trim()=="SUCCESS"){           
            // $(this).closest('tr.delete_row').remove();    
            alert ("Khóa tài khoản thành công");  
            location.reload()  ;  
          };
        }
     })
   });
  });
});
  </script>
  <!-- kết thúc đoạn script khóa user -->

  <!-- Đoạn script lấy thông tin từ bảng -->
  <script>
    $(function () {
  $('.remove').click(function (e) {
    e.preventDefault();
    var idUser = $(this).attr('id');
   $('#deleteUser').click(function(e){
  
     $.ajax({
       
       url: "delete/"+idUser,
        cache:false,
        success :function(data){
          if(data.trim()=="SUCCESS"){
           
            // $(this).closest('tr.delete_row').remove();    
            alert ("Xóa tài khoản thất bại");  
            location.reload()  ;  
          };
        }
     })
   });
  });
});
  </script>
 <!--Kết thúc đoạn script lấy thông tin từ bảng -->
  <script>
  //Script kiểm tra thông tin người dùng nhập vào
  $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");  
$("#upload").validate({
    rules: {
      name: {
      required:true,
      minlength:5,
      },
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        validatePassword: true,
        minlength: 8,
      },
      re_password: {
        required: true,
        equalTo: "#password",
        minlength: 8,
       
      }
    },

    messages: {
      name:{
        required: "Vui lòng nhập tên của bạn",
        minlength:"Tên có ít nhất 5 ký tự" 
      },
      
      password: {        
        required: "Vui lòng nhập lại mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 8 ký tự"
      },
      re_password: {
        equalTo: "Mật khẩu không khớp",
        required: "Vui lòng nhập lại mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 8 ký tự"
      },
      email: "Vui lòng nhập địa chỉ email của bạn"
    },

    // submitHandler: function(form) {
    //  form.submit();
    // }
 });
 //kết thúc script kiểm tra thông tin người dùng nhập vào
  </script>

<script>

$(document).ready(function(){
  //Script tạo mới user
var i=0;
var dataImage = new Array();
var dataPosition = new Array();

$("#images").change(function(){
    var checkImage = this.value;
    var ext = checkImage.substring(checkImage.lastIndexOf('.') + 1).toLowerCase();
    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
    {
        change(this);
        var file = document.getElementById('images').files[0];
        dataImage[i]=file; //add push to array dataImage
        dataPosition[i]=i;  //add push position to dataPosition
       //created html progress
        var html_progress = '<div class="progress" style="margin-bottom:5px;"><div class="progress-bar" id="progress-'+i+'" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div></div>';
        $(".show-progress").append(html_progress);
        i++;
    }
    else
        alert("Please select image file (jpg, jpeg, png).")  
});
var change = function(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var addImage = '<div class="col-md-3"><img src='+e.target.result+'></div>';
           
            //add image to div="showImage"
            $("#showImage").append(addImage);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
var upload = function(data,position){
    var formData = new FormData($("#upload")[0]);  
       //append data to formdata 
        formData.append('image',data);
        // formData.append('name',$('#name').val());
        // formData.append('email',$('#email').val());
        // formData.append('password',$('#password').val());
        // formData.append('re_password',$('#re_password').val());
       // formData.append('image',data);
        var id = position;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'add',
            data:formData,
            contentType: false,
            dataType:'json',
            processData: false,
            cache:false,
            
            xhr: function () {
                console.log(id);
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        if(percentComplete==100){
                            dataImage.splice(id, 1);
                            dataPosition.splice(id, 1);
                        }
                        $("#progress-"+id).text(percentComplete + '%');
                        $("#progress-"+id).css('width', percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            
            success:function(data){
              alert("Thêm user thành công");  
               noidung='tbody';
              noidung='<tr>'   ; 
                          
                    noidung+='<td>'+$('#name').val()+'</td>';
                    noidung+='<img class="card-img-top img-fluid" src="'+$('#image').val()+'">';
                    noidung+='<td>'+$('#email').val()+'</td>';   
                    noidung+='<td>'+$('#image').val()+'</td>';  
           noidung+=' <td><a href="{{route('user.get_edit',$user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>';
                       
           noidung+='  <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>';
                      
           noidung+='   <td><a href="{{route('user.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>   ';
                    noidung+='</tr>'          ;      
                   
                    noidung+='</tbody>';
                      $('.table').append(noidung);  
            },
            error:function(data){
              alert("Email đã tồn tại");  
            }
           
        });
}

$("form#upload").submit(function( event ) {
        event.preventDefault();
        var k=0;
        for(k=0; k<dataImage.length;k++){
            /**
             * Function Upload
             * params 1: data image
             * params 2: position[ progressbar-1 or progressbar-2,...]
             */
            upload(dataImage[k],dataPosition[k]);
        }    
});

});
//Kết thúc script tạo mới user
</script>


@stop
  