<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment=payment::find($id);
        $payment->status=4;
        $payment->update();
        
        return redirect()->back()->with('status', 'Hủy đơn hàng thành công');
        $message = "Hủy đơn hàng thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";

    }

   
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $cart=json_encode(session('cart'));
        //echo $cart;
        $payment= new payment();
        $payment->id_user=$request->id_user;        
        
        $payment->address=$request->address;
        $payment->payment_method=$request->payment_method;
        $payment->shipping_unit=$request->shipping_unit;
        $payment->note=$request->note;
        $payment->status=0; 
        $payment->cart=$cart;
       $payment->save();
       $user="";
       $user=Auth::user();
       $message = "Đặt hàng thành công, bạn sẽ được đưa về cửa hàng";
        echo "<script type='text/javascript'>alert('$message');</script>";
       $laptop=Product::where('idCategory','1')->where('status','1')->get();
       $pc=Product::where('idCategory','2')->where('status','1')->get();
       $monitor=Product::where('idCategory','3')->where('status','1')->get();      
       $request->session()->forget('cart');
       return view('FrontEnd.shop', compact('laptop','pc','monitor','user'));
    }

  
}
