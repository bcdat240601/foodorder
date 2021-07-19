<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use Carbon\Carbon;

use DB;
class MyprofileController extends Controller
{
    public function show(){
        $category = DB::table('category')->get();
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
    public function account(){
        $idkh = session()->get('idad');
        $admin = Admin::where('id','=',$idkh)->first();
        return view('Admin/Auth/profile',['admin'=>$admin]);
    }
    public function editadmin(Request $req){
        $model = Admin::find($req->id);
        $model->name = $req->name;      
        // $model->Address = $req->address;
        // $model->Phone = $req->phonenumber;
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
    public function deletecmt(Request $req){
        $row = $req->row;
        $model = DB::table('binhluan')->where('stt', '=', $row)->delete();
        return view('admin/Product/Showcomment');
    }
    public function thongke(){
        session()->put('typeall',1);
        $type = $_GET['select'];
        if ($_GET['from'] == null) {
            $message = 'please insert started time';
            return view('admin/thongke',['message'=>$message]);
        }elseif($_GET['to'] == null){
            $message = 'please insert ended time';
            return view('admin/thongke',['message'=>$message]);
        }elseif($_GET['from'] >= $_GET['to']){
            $message = 'please insert correct time';
            return view('admin/thongke',['message'=>$message]);
        }
        else{
            $from = $_GET['from']." 00:00:00";
            $to = $_GET['to']." 00:00:00";
            if ($type == 1) {
                $title = ['Best selling Product','Cost','Quantity'];
                $thongke = DB::table('orderdetail')->join('food','orderdetail.FoodID','=','food.id')->select('food.FoodName','orderdetail.Subtotal',DB::raw('SUM(orderdetail.Quantity) as Quantity'))->where([['created_at','>',$from],['created_at','<',$to]])->groupBy('food.FoodName','orderdetail.Subtotal')->orderByDesc('Quantity')->take(10)->get();
                session()->put('thongketype',1);
            }
            if ($type == 2) {
                $title = ['Top Customer of time','buying time'];
                $thongke = DB::table('orderfood')->join( 'customer','orderfood.CustomerID','=','customer.id')->select('customer.CustomerName',DB::raw('COUNT(customer.id) as solan'))->where([['created_at','>',$from],['created_at','<',$to]])->groupBy('customer.CustomerName')->orderByDesc('solan')->take(10)->get();
                session()->put('thongketype',2);
            }
            return view('admin/thongke',['thongke'=>$thongke,'from'=>$from,'to'=>$to,'title'=>$title]);
        }
    }
    public function thongkeloai(){
        session()->put('typeall',2);
        $type = $_GET['type'];
        if ($_GET['from'] == null) {
            $message = 'please insert started time';
            return view('admin/thongke',['message'=>$message]);
        }elseif($_GET['to'] == null){
            $message = 'please insert ended time';
            return view('admin/thongke',['message'=>$message]);
        }elseif($_GET['from'] >= $_GET['to']){
            $message = 'please insert correct time';
            return view('admin/thongke',['message'=>$message]);
        }
        else{
            $from = $_GET['from']." 00:00:00";
            $to = $_GET['to']." 00:00:00";
            $title = ['Best selling Product','Cost','Quantity'];
            $thongke = DB::table('orderdetail')->join('food','orderdetail.FoodID','=','food.id')->select('food.FoodName','orderdetail.Subtotal',DB::raw('SUM(orderdetail.Quantity) as Quantity'))->where([['created_at','>',$from],['created_at','<',$to],['CategoryID','=',$type]])->groupBy('food.FoodName','orderdetail.Subtotal')->orderByDesc('Quantity')->take(10)->get();
            session()->put('typesanpham',$type);
            return view('admin/thongke',['thongke'=>$thongke,'from'=>$from,'to'=>$to,'title'=>$title]);
        }
    }
    public function home(){
        $past='2021-06-30 17:11:24';
        $now = Carbon::now();
        $thongke = DB::table('orderdetail')->join('food','orderdetail.FoodID','=','food.id')->select('food.FoodName','food.Image_Name','orderdetail.Subtotal',DB::raw('SUM(orderdetail.Quantity) as Quantity'))->where([['created_at','>',$past],['created_at','<',$now]])->groupBy('food.FoodName','orderdetail.Subtotal')->orderByDesc('Quantity')->take(3)->get();
        
    }
    public function deletefood(){
        $row = $_GET['row'];
        $model = DB::table('food')->where('id', '=', $row)->delete();        
    }
}
