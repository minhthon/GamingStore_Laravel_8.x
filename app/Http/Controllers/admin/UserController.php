<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Classes\Helper;
use Session;
use Storage;

class UserController extends Controller
{   public $viewprefix;
    public $viewnamespace;
    public function __construct()
    {   //$this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.user.';
        $this->viewnamespace='panel/user';
    }
    public function index()
    {
        $users = User::where('status','1')->get();   
        return view($this->viewprefix.'index', compact('users'));
       
    }
    public function hidden_user()
    {
        $users = User::where('status','0')->get();   
        return view($this->viewprefix.'hidden_user', compact('users'));
       
    }
    public function get_add()
    {
        return view('admin.user.add'); 
    }
    public function post_add(request $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $exection = $file->getClientOriginalExtension();
            $file->move(public_path().'/image/user/', $name); 
            $email=$request->email;// Lấy giá trị Email từ form gửi lên      
            $check_mail=0;
            $user=User::all();//Lấy tất cả dử liệu user
            //Vòng lập kiểm tra email đã tồn tại hay chưa
            foreach($user as $user){
                    if($email== $user->email){ // Nếu tìm thấy email trong hệ thống thì biến check_mail được gán giá trị là 1
                        $check_mail=1; 
                        //Check_mail=1 có nghĩa email đã có trong hệ thống nên không tạo mới được
                    } 
                }  
          //Nếu email chưa tồn tại thì khỏi tạo user mới và thêm user mới vào      
          if($check_mail==0 ){
    	    $user = new User;       
            $user->name = $request->name;       
            $user->email =$request->email;       
            $user->password = Hash::make($request->password);         
            $user->image=$name;
            $user->status=1;            
            $user->save();
            return Response()->json(array('success'=>1,'message'=>'Upload success!'));            
          }
          else{ //Điều kiện của email
            return Response()->json(array('error'=>0,'message'=>'Add User Error!'));
          }//Kết thúc của check_mail

        }
        else{
          //  return Response()->json(array('success'=>-1,'message'=>'Upload error!'));
        }
    }
    public function get_edit($id)
    {
        $user = User::findOrFail($id);
        return view($this->viewprefix.'edit',compact('user'));      
    }
    public function post_edit($id,request $request)
    {
        $user = User::findOrFail($id);
        $pass=$user->password;//Gán mật khẩu củ cho biến pass để khi người dùng không nhập mật khẩu thì mật khẩu sẽ không thay đổi     
        if($request->password=="")
        {
            $user->password=$pass;
        }
        else{
            $user->password = Hash::make($request->password);
        }      
        //Lấy tên hình ảnh củ
        $temp_img=$user->image;
        //Lấy giá trị ảnh mới nếu có
        $temp_img2=Helper::imageUpload($request);
        
        //Kiểm tra người dùng có thay đổi ảnh không
        if($temp_img != $temp_img2){     
            $user->image=$temp_img2;//Gán giá trị cho biến temp là hình ảnh được chọn upload         
        }else{
            $user->image=$temp_img;
        }   

        if($user->image!=""){       
            $user->update();
            Session::flash('message', 'successfully!');
            $users = User::all();      
            return view($this->viewprefix.'index', compact('users'));    
        }
        else{
            
        $user = User::findOrFail($id);
      
            Session::flash('message', 'Thay đổi thông tin thông thành công vui lòng kiểm tra kích thước hình ảnh!');
            return view($this->viewprefix.'edit',compact('user'));      
        }
    }
    public function lockUser($id){
        $user=User::find($id);  
        $user->status=0;
        $user->update();
        $str="SUCCESS";   
        return $str;
    }
    public function unlockUser($id){
        $user=User::find($id);  
        $user->status=1;
        $user->update();
        $str="SUCCESS";   
        return $str;

    }

    public function delete($id)
    {
        $user = User::findOrFail($id);   
        if($user->delete()){
            $str="SUCCESS";             
        }          
        else{
            Session::flash('message', 'Failure!');
            $str="ERROR";   
        }
    return $str;               
    }
}
