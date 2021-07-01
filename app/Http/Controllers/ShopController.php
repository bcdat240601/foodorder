<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class ShopController extends Controller
{
    public function show(){
        $category = Category::where([['id','>',1],['id','<',9]])->get();
        $id = $_GET['id'];
        $data=Food::find($id);
        return view('web/ProductDetail',["data"=>$data,'category'=>$category]);
    }

}
