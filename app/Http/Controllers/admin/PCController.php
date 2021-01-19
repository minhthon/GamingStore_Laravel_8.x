<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use App\Classes\Helper;
class PCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.pc.';
        $this->viewnamespace='panel/pc';
    }
    public function index()
    {
        $product= Product::where('idCategory','2')->Where( 'status','1')->get();
         
        $category = Category::all();
        return view($this->viewprefix.'index', compact('product','category'));
    }
    public function hidden_pc()
    {
        $product= Product::where('idCategory','2')->Where( 'status','0')->get();        
        $category = Category::all();
        return view($this->viewprefix.'hidden_pc', compact('product','category'));
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
       $pc=array(               
                'key'=>$request->name,
                'quantity'=>$request->quantity,
                'origin'=>$request->origin,
                'warranty_period'=>$request->warranty_period,
                'mainboard'=>$request->mainboard,
                'cpu'=>$request->cpu,
                'ram'=>$request->ram,
                'vga'=>$request->vga,
                'vga'=>$request->vga,
                'hdd'=>$request->hdd,
                'ssd'=>$request->ssd,
                'case'=>$request->case,            
                'cooling'=>$request->cooling,
             
                'content'=>$request->content,              
        ) ;     
        $pc=json_encode($pc);           
        $product->price=$request->price;
        $product->name=$request->name;
        $product->description=$pc;
        $product->classify=$request->classify;
        $product->idcategory=2; 
        $product->image=Helper::Upload($request);
        $product->status=1; 
     
        if($product->save()){
            Session::flash('message', 'Successfully!');
          return redirect()->route('pc.index');    
           
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
    public function show($id)
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
        $pc=array(               
            
            'quantity'=>$request->quantity,
            'origin'=>$request->origin,
            'warranty_period'=>$request->warranty_period,
            'mainboard'=>$request->mainboard,
            'cpu'=>$request->cpu,
            'ram'=>$request->ram,
            'vga'=>$request->vga,
            'vga'=>$request->vga,
            'hdd'=>$request->hdd,
            'ssd'=>$request->ssd,
            'case'=>$request->case,            
            'cooling'=>$request->cooling,
          
            'content'=>$request->content,           
        ) ;        
        $product->classify=$request->classify;
        $pc=json_encode($pc);  
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
        $product->description=$pc;
        if($product->update()){                
            Session::flash('message', 'Successfully!');
            return redirect()->route('pc.index');  
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

    public function lockPC($id){
        $product=Product::find($id);  
        $product->status=0;
        $product->update();
        $str="SUCCESS";   
        return $str;
    }
    public function unlockPC($id){
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
