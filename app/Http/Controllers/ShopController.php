<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use DB;

class ShopController extends Controller
{
    public function show(){
        $category = DB::table('category')->where('avaiable',1)->get();
        $id = $_GET['id'];
        $data=Food::find($id);
        $getcate = DB::table('food')->select('CategoryID')->where('id',$id)->first();
        $getrelate = DB::table('food')->where([['CategoryID',$getcate->CategoryID],['id','<>',$id],['Quantity','>=',1]])->inRandomOrder()->limit(10)->get();
        $binhluan = DB::table('binhluan')->join('customer','binhluan.idkh','=','customer.id')->where('idfood',$id)->orderByDesc('created_at')->get();
        return view('web/ProductDetail',["data"=>$data,'category'=>$category,'binhluan'=>$binhluan,'getrelate'=>$getrelate]);
    }

}
