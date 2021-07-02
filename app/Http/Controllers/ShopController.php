<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use DB;

class ShopController extends Controller
{
    public function show(){
        $category = Category::where([['id','>',1],['id','<',9]])->get();
        $id = $_GET['id'];
        $data=Food::find($id);
        $binhluan = DB::table('binhluan')->join('customer','binhluan.idkh','=','customer.id')->where('idfood',$id)->orderByDesc('created_at')->get();
        return view('web/ProductDetail',["data"=>$data,'category'=>$category,'binhluan'=>$binhluan]);
    }

}
