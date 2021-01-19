@extends('admin.user.layout')
@section('content')
 
<!-- Model bootstrap khóa user -->
<div class="modal fade" id="lock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận mở khóa tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Bạn có chắc là mình muốn mở khóa tài khoản này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="lockUser" type="button" class="btn btn-primary">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
 <!-- Kết thúc model bootstrap  khóa user-->
 <p class="p-edit">DANH SÁCH TÀI KHOẢN ĐANG KHÓA</p>
 <P class="p-edit"> <a href="{{route('user.index')}}">Trở về danh sách tài khoản</a></P>
<table class="table table-hover table">
      <thead>
        <th>Name</th>
        <th>Email</th>
        <th >Ảnh đại diện</th>        
        <th>Chỉnh sửa</th>
        <th>Mở khóa</th>
      
      </thead>
      <tbody class= "tbody">
        @foreach($users ?? '' as $user)
          <tr class="delete_row" >
            <td>{{$user->name}} </td>
            <td>{{$user->email}} </td>
            <td><img src="{{asset('image/user/'. $user->image)}}" width="40" /></td>
           
            <td><a  href="{{route('user.get_edit',$user->id)}}" class="btn btn-primary"><i class="fa fa-edit "></i></a></td>
            <td><a  class="btn btn-danger"><i class="fa fa-lock lock" id="<?php echo $user->id ?>" data-toggle="modal" data-target="#lock"></i></a></td>

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
        url: "unlockUser/"+id_lock,
        cache:false,
        success :function(data){
          if(data.trim()=="SUCCESS"){           
            // $(this).closest('tr.delete_row').remove();    
            alert ("Mở khóa tài khoản thành công");  
            location.reload()  ;  
          };
        }
     })
   });
  });
});
  </script>
  <!-- kết thúc đoạn script khóa user -->

  


@stop
  