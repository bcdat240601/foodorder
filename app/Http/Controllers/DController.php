<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DController extends Controller
{
    public function showwishlist(){
        $category = Category::where([['id','>',1],['id','<',9]])->get();
        return view('user/wishlist',['category'=>$category]);
    }
}
