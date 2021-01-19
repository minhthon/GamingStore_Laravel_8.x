
  
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
 



$(document).ready(function(){
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
