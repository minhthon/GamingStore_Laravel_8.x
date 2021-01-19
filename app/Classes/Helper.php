<?php
namespace App\Classes;
use Illuminate\Http\Request;
class Helper{
    public function __construct()
    {
    }
    public static function imageUpload(Request $request)
    {
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('image/user'), $imageName);
                return $imageName;
            }
        }
        return "";
    } 
    public static function Upload(Request $request)
    {
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('product'), $imageName);
                return $imageName;
            }
        }
        return "";
    } 
   
     public function __destruct()
    {
    }    
}
?>