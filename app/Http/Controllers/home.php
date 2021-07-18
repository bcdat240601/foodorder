<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use Carbon\Carbon;

use DB;

class home extends Controller
{
    public function home(){
        if(session('login') != 1){
            session()->put('login',0); 
        } 
        $past='2021-06-30 17:11:24';
        $now = Carbon::now();
        $thongke = DB::table('orderdetail')->join('food','orderdetail.FoodID','=','food.id')->select('food.id','food.Price','food.Image_Name','food.FoodName','orderdetail.Subtotal',DB::raw('SUM(orderdetail.Quantity) as Quantity'))->where([['created_at','>',$past],['created_at','<',$now]])->groupBy('food.id','food.Price','food.Image_Name','food.FoodName','orderdetail.Subtotal')->orderByDesc('Quantity')->take(3)->get(); 
        $new = DB::table('food')->inRandomOrder()->limit(3)->get();
        $all = DB::table('food')->inRandomOrder()->limit(6)->get();     
        $category = DB::table('category')->get();
        return view('Web/home',['category'=>$category,'thongke'=>$thongke,'new'=>$new,'all'=>$all]);
    }    
}
