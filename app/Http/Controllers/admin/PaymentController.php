<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\payment;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.category.';
        $this->viewnamespace='panel/category';
    }
    public function theother()
    {
       $other="";
       $other=payment::where('status','0')->get();
    return view('admin.payment.other',compact('other'));
    }
    public function detailscarts($id){      
            $other=payment::find($id);
            $cart=$other->cart;
            $cart=json_decode($cart,true);           
           return view('admin.payment.detailscarts', compact('cart'));
        
    }
    public function successfulother()
    {
       $other="";
       $other=payment::where('status','2')->get();
        return view('admin.payment.theotherissuccess',compact('other'));
    }
    public function theotherisshipping()
    {
       $other="";
       $other=payment::where('status','1')->get();
        return view('admin.payment.theotherisshipping',compact('other'));
    }
    public function theotherwascanceled()
    {
       $other="";
       $other=payment::where('status','4')->get();
        return view('admin.payment.theotherwascanceled',compact('other'));
    }
    public function confirm($id)
    {
        $payment=payment::find($id);
        $payment->status=1;
        $payment->update();        
        return redirect()->back()->with('status', 'Xác nhận đơn hàng thành công');
        $message = "Xác nhận đơn hàng thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";

    }
    public function confirms($id)
    {
        $payment=payment::find($id);
        $payment->status=2;
        $payment->update();        
        return redirect()->back()->with('status', 'Xác nhận đơn hàng thành công');
        $message = "Xác nhận đơn hàng thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";

    }
    
  
}
