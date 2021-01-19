<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\LaptopModel;
use App\Models\MonitorModel;
use App\Models\PCModel;
use Illuminate\Support\Facades\Hash;
use App\Classes\Helper;
use Session;

use App\Models\User;
use Auth;
class AccountController extends Controller
{
    public function __construct()
    {
        $this->viewnamespace='/';

    }
    public function login()
    {
        $user="";
       if (Auth::check()) {
         
           $user=Auth::user();//Lấy thông tin
           $laptop=LaptopModel::all();
           $pc=PCModel::all();
           $monitor=MonitorModel::all();
           return redirect('home',compact('user','laptop','pc','monitor')); 
       } else {
             return view('FrontEnd.account.login',compact('user'));
       }
   
    }
    public function UserLogin(request $request)
    {   
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'status'    =>1,
            'level'=>0,
            
        ];
        if (Auth::attempt($login)) {
        return redirect('/')->with('name',Auth::User()->name);
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }
 
  
    public function getUserLogout()
    {
        Auth::logout();
        $user="";
        $laptop=Product::where('idCategory','1')->where('status','1')->get();
        $pc=Product::where('idCategory','2')->where('status','1')->get();
        $monitor=Product::where('idCategory','3')->where('status','1')->get();
        return view('FrontEnd.index', compact('laptop','pc','monitor','user'));
    }
    public function register()
    {
       $user="";
       $user=Auth::user();//Lấy thông tin
       return view('FrontEnd.account.register',compact('user'));
    }
   
    
    public function Add_User(request $request)
    {
       $email=$request->email;// Lấy giá trị Email từ form gửi lên
      
       $check_mail=0;      $check_pass=0; 
       $user=User::all();
       foreach($user as $user){
            if($email== $user->email){ // Nếu tìm thấy email trong hệ thống thì biến check_mail được gán giá trị là 1
                $check_mail=1; 
              
            } 
        }
        //Check_mail=1 có nghĩa email đã có trong hệ thống nên không tạo mới được
      
          if($check_mail==0){
           $user = new User;
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->image = Helper::imageUpload($request);
            $user->status=1;
           $user->save();
           Session::flash('message', 'Đăng kí thành công. Bạn được chuyển hướng về trang đăng nhập!');
            return redirect('login');
          }
         else{
            Session::flash('message', 'Đăng kí không thành công do Email đã tồn tại!');
         }
    }
    public function get_user($id)
    {
        $user = User::findOrFail($id);
        return view('FrontEnd.account.user',compact('user'));      
    }
    public function get_edit($id)
    {
        $user = User::findOrFail($id);
        return view('FrontEnd.account.edituser',compact('user'));      
    }
    public function post_edit($id,request $request)
    {
        $user = User::findOrFail($id);
        $pass=$user->password;//Gán mật khẩu củ cho biến pass để khi người dùng không nhập mật khẩu thì mật khẩu sẽ không thay đổi     
        if($request->password==""&& $request->re_password=="")
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
            $user->name=$request->name;   
            $user->update();
            Session::flash('message', 'successfully!');
            $user = User::find($id);     
            return view('FrontEnd.account.user',compact('user'));      
        }
        else{
            
        $user = User::findOrFail($id);
      
            Session::flash('message', 'Thay đổi thông tin không thành công vui lòng kiểm tra kích thước hình ảnh!');
            return view('FrontEnd.account.user',compact('user'));      
        }
    }
   
   
}
?>