<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class HomeController extends Controller
{
    public function __construct()

    {
 
    }
 
    public function myHome()
 
    {
        
        return view('admin.myHome');
 
    }
 
 
    public function myUsers()
 
    {
        return view('admin.myUsers');
    }
}
