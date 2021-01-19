<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LaptopModel;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.laptop.';
        $this->viewnamespace='panel/laptop';
    }
    public function index()
    {
        $product= Product::where('idCategory','1')->Where( 'status','1')->get();
         
        $category = Category::all();
        return view($this->viewprefix.'index', compact('product','category'));
    }
    public function hidden_laptop()
    {
        $product= Product::where('idCategory','1')->Where( 'status','0')->get();        
        $category = Category::all();
        return view($this->viewprefix.'hidden_laptop', compact('product','category'));
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
       $laptop=array(               
                'key'=>$request->name,
                'quantity'=>$request->quantity,
                'origin'=>$request->origin,
                'warranty_period'=>$request->warranty_period,
                'cpu'=>$request->cpu,
                'ram'=>$request->ram,
                'vga'=>$request->vga,
                'vga'=>$request->vga,
                'hard_drive'=>$request->hard_drive,
                'display'=>$request->display,
                'display'=>$request->display,            
                'connector'=>$request->connector,
                'audio'=>$request->audio,
                'wifi'=>$request->wifi,
                'bluetooth'=>$request->bluetooth,
                'operating_system'=>$request->operating_system,
                'battery'=>$request->battery,
                'weight'=>$request->weight,
                'color'=>$request->color,
                'size'=>$request->size,
                'content'=>$request->content,
                               
               // 'image'=>Helper::imageUpload($request),
        ) ;        
        $laptop=json_encode($laptop);           
        $product->price=$request->price;
        $product->name=$request->name;
        $product->description=$laptop;
        $product->classify=$request->classify;    
        $product->image=Helper::Upload($request);
        $product->status=1;
        $product->idcategory=1;
        if($product->save()){
            Session::flash('message', 'Successfully!');
            return redirect()->route('laptop.index');   
           
        }      
        else{
            Session::flash('message', 'Failure!');      
            }  
   
    }
       
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaptopModel  $laptopModel
     * @return \Illuminate\Http\Response
     */
    public function show($id,LaptopModel $laptopModel)
    {
        $product = Product::findOrFail($id);// Tìm laptop có id được truyền vào
        $des=$product->description;
        $des=json_decode($des);    
        return view($this->viewprefix.'show', compact('product','des'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaptopModel  $laptopModel
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
     * @param  \App\Models\LaptopModel  $laptopModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request )
    {
        $product=Product::find($id);
        $laptop=array(              
            
            'quantity'=>$request->quantity,
            'origin'=>$request->origin,
            'warranty_period'=>$request->warranty_period,
            'cpu'=>$request->cpu,
            'ram'=>$request->ram,
            'vga'=>$request->vga,
            'vga'=>$request->vga,
            'hard_drive'=>$request->hard_drive,
            'display'=>$request->display,
            'display'=>$request->display,            
            'connector'=>$request->connector,
            'audio'=>$request->audio,
            'wifi'=>$request->wifi,
            'bluetooth'=>$request->bluetooth,
            'operating_system'=>$request->operating_system,
            'battery'=>$request->battery,
            'weight'=>$request->weight,
            'color'=>$request->color,
            'size'=>$request->size,
            'content'=>$request->content,
            'classify'=>$request->classify,               
        ) ;        
        $laptop=json_encode($laptop);     
        $image=Helper::Upload($request);
        //Gán giá trị cho biến temp là hình ảnh củ
        $temp=$product->image;
        if($image ==""){   //kiểm tra nếu ảnh là null thì lấy hình ảnh củ
        $product->image = $temp;//Gán giá trị        
        }
        else{ 
            $product->image=$image;
        }
        $product->price=$request->price;
        $product->name=$request->name;
        $product->description=$laptop;
        if($product->update()){                
            Session::flash('message', 'Successfully!');
            return redirect()->route('laptop.index');  
        }
        else
            Session::flash('message', 'Failure!');
      
    }
  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaptopModel  $laptopModel
     * @return \Illuminate\Http\Response
     */

    public function lockLaptop($id){
        $product=Product::find($id);  
        $product->status=0;
        $product->update();
        $str="SUCCESS";   
        return $str;
    }
    public function unlockLaptop($id){
        $product=Product::find($id);  
        $product->status=1;
        $product->update();
        $str="SUCCESS";   
        return $str;

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaptopModel  $laptopModel
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
