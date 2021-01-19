<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\monitorModel;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;

class monitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.monitor.';
        $this->viewnamespace='panel/monitor';
    }
    public function index()
    {
        $product= Product::where('idCategory','3')->Where( 'status','1')->get();
         
        $category = Category::all();
        return view($this->viewprefix.'index', compact('product','category'));
    }
    public function hidden_monitor()
    {
        $product= Product::where('idCategory','3')->Where( 'status','0')->get();        
        $category = Category::all();
        return view($this->viewprefix.'hidden_monitor', compact('product','category'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $category = Category::all();
    //     return view($this->viewprefix.'create',compact('category'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
       $product = new Product();
       $monitor=array(               
                'key'=>$request->name,
                'quantity'=>$request->quantity,
                'origin'=>$request->origin,
                'warranty_period'=>$request->warranty_period,
                'model'=>$request->model,
                'resoluton'=>$request->resoluton,
                'screen_curvature'=>$request->screen_curvature,
                'brightness'=>$request->brightness,
                'contrast_ratio_static'=>$request->contrast_ratio_static,
                'response_time'=>$request->response_time,               
                  
                'content'=>$request->content,                            
              
        ) ;        
        $monitor=json_encode($monitor);           
        $product->price=$request->price;
        $product->name=$request->name;
        $product->description=$monitor;  
        $product->classify=$request->classify;    
        $product->image=Helper::Upload($request);
        $product->status=1;
        $product->idcategory=3;
        if($product->save()){
            Session::flash('message', 'Successfully!');
            return redirect()->route('monitor.index');   
           
        }      
        else{
            Session::flash('message', 'Failure!');      
            }  
   
    }
       
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\monitorModel  $monitorModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);// Tìm monitor có id được truyền vào
        $des=$product->description;
        $des=json_decode($des);    
        return view($this->viewprefix.'show', compact('product','des'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\monitorModel  $monitorModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $des=$product->description;
        $des=json_decode($des);       
        $category = Category::all();
        return view($this->viewprefix.'edit',compact('product','des','category'));    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monitorModel  $monitorModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request )
    {
        $product=Product::find($id);
        $monitor=array(               
          
            'quantity'=>$request->quantity,
            'origin'=>$request->origin,
            'warranty_period'=>$request->warranty_period,
            'model'=>$request->model,
            'resoluton'=>$request->resoluton,
            'screen_curvature'=>$request->screen_curvature,
            'brightness'=>$request->brightness,
            'contrast_ratio_static'=>$request->contrast_ratio_static,
            'response_time'=>$request->response_time,               
                        
            'content'=>$request->content,               
        ) ; 
        $product->classify=$request->classify;           
        $monitor=json_encode($monitor);     
        $product->price=$request->price;
        $image=Helper::Upload($request);
        //Gán giá trị cho biến temp là hình ảnh củ
        $temp=$product->image;
        if($image ==""){   //kiểm tra nếu ảnh là null thì lấy hình ảnh củ
        $product->image = $temp;//Gán giá trị        
        }
        else{ 
            $product->image=$image;
        }
        $product->name=$request->name;
        $product->description=$monitor;
        if($product->update()){                
            Session::flash('message', 'Successfully!');
                    
            return redirect()->route('monitor.index');  
          
        }
        else
            Session::flash('message', 'Failure!');
      
    }
  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monitorModel  $monitorModel
     * @return \Illuminate\Http\Response
     */

    public function lockMonitor($id){
        $product=Product::find($id);  
        $product->status=0;
        $product->update();
        $str="SUCCESS";   
        return $str;
    }
    public function unlockMonitor($id){
        $product=Product::find($id);  
        $product->status=1;
        $product->update();
        $str="SUCCESS";   
        return $str;

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\monitorModel  $monitorModel
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $product=Product::find($id);   
        if($product->delete()){
            $str="SUCCESS";       
        }
        else
        $str="ERROR";   
        
        return $str;
    }
}
