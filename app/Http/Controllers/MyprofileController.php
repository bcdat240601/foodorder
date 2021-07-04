<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\User;

use DB;
class MyprofileController extends Controller
{
    public function show(){
        $category = Category::where([['id','>',1],['id','<',9]])->get();
        $idkh = session()->get('idkh');
        $user = User::where('id','=',$idkh)->first();
        $items = session()->get('cart');
        return view('user/myprofile',['items'=>$items,'user'=>$user,'category'=>$category]);
    }
    public function edit(Request $req){
        $model = User::find($req->id);
        $model->CustomerName = $req->name;      
        $model->Address = $req->address;
        $model->Phone = $req->phonenumber;
        $model->email = $req->email;
        $model->save();
        return redirect()->back();
    }
    public function Comment(){
        $data = food::select("id","FoodName","Price","Quantity","CategoryID","Image_Name")->get();
        return view("admin/product/comment",["data"=>$data]);
    }
    public function showcomment($id){
        $data=Food::find($id);
        $binhluan = DB::table('binhluan')->join('customer','binhluan.idkh','=','customer.id')->where('idfood',$id)->orderByDesc('created_at')->get();
        return view('admin/Product/Showcomment',["data"=>$data,'binhluan'=>$binhluan]);
    }
}
