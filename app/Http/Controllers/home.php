<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

use DB;

class home extends Controller
{
    public function home(){
        if(session('login') != 1){
            session()->put('login',0); 
        }
        return view('Web/home');
    }
    public function showcategory(){
        $category;
    }
}
