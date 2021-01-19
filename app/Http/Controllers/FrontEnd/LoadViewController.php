<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Classes\Helper;
use Session;

use App\Models\User;
use App\Models\payment;
use Auth;
class LoadViewController extends Controller
{
   
    public function index()
    {
        $user="";
        $user=Auth::user();
        $laptop=Product::where('idCategory','1')->where('status','1')->get();
        $pc=Product::where('idCategory','2')->where('status','1')->get();
        $monitor=Product::where('idCategory','3')->where('status','1')->get();
        return view('FrontEnd.index', compact('laptop','pc','monitor','user'));
    }

    public function other()
    {
        $user="";
        $user=Auth::user();
        $other=payment::where('id_user',$user->id)->get();       
       // echo($other);   
        return view('FrontEnd.account.other', compact('other','user'));
    }
    public function cart_details($id){
        $user=Auth::user();
        $other=payment::find($id);
        $cart=$other->cart;
        $cart=json_decode($cart,true);
       
       return view('FrontEnd.details.cart_details', compact('cart','user'));
    }
    public function shop()
    {
        $user="";
        $user=Auth::user();
        $laptop=Product::where('idCategory','1')->where('status','1')->get();
        $pc=Product::where('idCategory','2')->where('status','1')->get();
        $monitor=Product::where('idCategory','3')->where('status','1')->get();
        return view('FrontEnd.shop', compact('laptop','pc','monitor','user'));
    }
    public function laptop()
    {
        $user="";
        $user=Auth::user();
        $laptop=Product::where('idCategory','1')->where('status','1')->get();   
        return view('FrontEnd.laptop', compact('laptop','user'));
    }
    public function LaptopGaming(){
        $user="";
        $user=Auth::user();
        $laptop =Product::where('idCategory','1')->where('status','1')->where('classify','Laptop Gaming')->get();
        return view('FrontEnd.laptop', compact('laptop','user'));
    }
    public function LaptopDoanhNhan(){
        $user="";
        $user=Auth::user();
        $laptop =Product::where('idCategory','1')->where('status','1')->where('classify','Laptop Doanh Nhân')->get();
        return view('FrontEnd.laptop', compact('laptop','user'));
    }
    public function LaptopVanPhong(){
        $user="";
        $user=Auth::user();
        $laptop =Product::where('idCategory','1')->where('status','1')->where('classify','Laptop Văn Phòng')->get();
        return view('FrontEnd.laptop', compact('laptop','user'));
    }

    public function pc()
    {
        $user="";
        $user=Auth::user();
        $pc=Product::where('idCategory','2')->where('status','1')->get();
        //$des_pc=json_decode($pc->description);
        return view('FrontEnd.pc', compact('pc','user'));
    }
    public function PCGaming(){
        $user="";
        $user=Auth::user();
        $pc =Product::where('idCategory','2')->where('status','1')->where('classify','PC Gaming')->get();
        return view('FrontEnd.pc', compact('pc','user'));
    }
    public function PCTamTrung(){
        $user="";
        $user=Auth::user();
        $pc =Product::where('idCategory','2')->where('status','1')->where('classify','PC Văn Phòng')->get();
        return view('FrontEnd.pc', compact('pc','user'));
    }
    public function PCCaoCap(){
        $user="";
        $user=Auth::user();
        $pc =Product::where('idCategory','2')->where('status','1')->where('classify','PC Workstation')->get();
        return view('FrontEnd.pc', compact('pc','user'));
    }
    public function MonitorAsus(){
        $user="";
        $user=Auth::user();
        $monitor =Product::where('idCategory','3')->where('status','1')->where('classify','ASUS')->get();
        return view('FrontEnd.monitor', compact('monitor','user'));
    }
    public function MonitorDell(){
        $user="";
        $user=Auth::user();
        $monitor =Product::where('idCategory','3')->where('status','1')->where('classify','DELL')->get();
        return view('FrontEnd.monitor', compact('monitor','user'));
    }
    public function MonitorSamsung(){
        $user="";
        $user=Auth::user();
        $monitor =Product::where('idCategory','3')->where('status','1')->where('classify','SAMSUNG')->get();
        return view('FrontEnd.monitor', compact('monitor','user'));
    }
    public function MonitorMSI(){
        $user="";
        $user=Auth::user();
        $monitor =Product::where('idCategory','3')->where('status','1')->where('classify','MSI')->get();
        return view('FrontEnd.monitor', compact('monitor','user'));
    }
   

    public function monitor()
    {
        $user="";
        $user=Auth::user();
        $monitor=Product::where('idCategory','3')->where('status','1')->get();
        //$des_monitor=json_decode($monitor->description);
        return view('FrontEnd.monitor', compact('monitor','user'));
    }
    public function product_details($id)
    {        
        $user="";
        $user=Auth::user();
        $product =Product::all();
       for($i=0;$i<$product->count();$i++){
            if($product[$i]->id==$id){
                $temp=$product[$i];
                $temp_category=$product[$i]->idCategory;
                $temp_description=$product[$i]->description;
                break;
            }
       }     
        if($temp_category==1){
            $des=json_decode($temp_description);
            $laptop=$temp;
            $laptop1=Product::where('idCategory','1')->where('status','1')->get();
            return view('FrontEnd.details.laptop_details', compact('laptop','laptop1','des','user'));
        }
        if($temp_category==2){
            $des=json_decode($temp_description);
            $pc=$temp;
            $pc1=Product::where('idCategory','2')->where('status','1')->get();
            return view('FrontEnd.details.pc_details', compact('pc','pc1','des','user'));
        }
        if($temp_category==3){
            $des=json_decode($temp_description);
            $monitor=$temp;
            $monitor1=Product::where('idCategory','3')->where('status','1')->get();
            return view('FrontEnd.details.monitor_details', compact('monitor','monitor1','des','user'));
        }
        // $laptop=Product::where('idCategory','1')->where('status','1')->get();
        // $pc=Product::where('idCategory','2')->where('status','1')->get();
        // $monitor=Product::where('idCategory','3')->where('status','1')->get();
        // return view('FrontEnd.shop', compact('laptop','pc','monitor','user'));
    }
   
   
    public function cart()
    {   
        $user="";
        if(Auth::check())
        {
            $user=Auth::user();
            return view('FrontEnd.cart',compact('user'));
        }
        else{
            return view('FrontEnd.account.login',compact('user'));
        }    
    
    }
}
?>