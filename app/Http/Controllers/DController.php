<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\wishlist;
use App\Models\binhluan;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Mail;

class DController extends Controller
{
    public function showwishlist(){
        $idkh = session()->get('idkh');
        $category = DB::table('category')->get();
        $wishitem = DB::table('wishlist')->join('food','wishlist.idfood','=','food.id')->where('idkh',$idkh)->get();
        return view('user/wishlist',['category'=>$category,'wishlist'=>$wishitem]);
    }
    public function addwish(){        
        $idkh = session()->get('idkh');        
        if($idkh == 0 || $idkh == null){
            return 0;
        }
        $idfood = $_GET['id'];
        $checktrung = DB::table('wishlist')->get();
        foreach ($checktrung as $value) {
            if ($value->idkh == $idkh && $value->idfood == $idfood) {
                return 2;
            }   
        }                
        $itemwish = new wishlist();
        $itemwish->idkh = $idkh;
        $itemwish->idfood = $idfood;
        $itemwish->save();
        return 1;
    }
    public function delete(){
        $idkh = session()->get('idkh');
        $idfood = $_GET['id'];
        DB::table('wishlist')->where([['idkh',$idkh],['idfood',$idfood]])->delete();
        echo 'Đã Xóa Sản Phẩm Thành Công';
    }
    public function comment(Request $req){
        $cusname = session()->get('namekh');
        $idkh = session()->get('idkh');        
        if($idkh == 0 || $idkh == null){
            return 0;
        }
        $binhluan = new binhluan();
        $binhluan->idkh = $idkh;
        $binhluan->idfood = $req->idfood;
        $binhluan->loibinhluan = $req->loibinhluan;
        $binhluan->save();
        return '<div style="border:solid 1px;padding-left: 35px;"><span><img class="img-profile rounded-circle" src="'.asset("img/man.png").'" style="text-align: right;"><h3 class="name" style="margin-top: -58px;
        margin-left: 60px;">'.$cusname.'</h3></span>
        <span class="cmt" style=" margin-left: 64px;margin-top: -3px;display:block">'.$req->loibinhluan.'</span></div>';
        

    }
    public function search(){
        $category = DB::table('category')->get();
        $search = $_GET['search'];
        $data = DB::table('food')->where('FoodName','LIKE',"%{$search}%")->paginate(9);
        return view ("Web/Shop", ["data"=>$data,'category'=>$category,'search'=>$search]);
    }
    public function hint(Request $req){
        $hint = $req->gethint;
        if($hint != null){
            $data = DB::table('food')->select('id','FoodName')->where('FoodName','LIKE',"%{$hint}%")->get();
            if(!$data->isEmpty()){
                $output = '<ul class="dropdown-menu" style="display:block;">';        
                foreach ($data as $value) {
                    $output .= '<li><a href="'.url("/detail?id={$value->id}").'" class="item">'.$value->FoodName.'</a></li>';
                }            
            $output .= '</ul>';
            return $output;
            }
        }
        
    }
    public function showchangepass(){
        return view('Web/changepass');
    }
    public function changepass(Request $req){
        $idkh = session()->get('idkh');                
        $currentpassword = $req->oldpass;
        $newpassword1 = $req->newpass1;
        $newpassword2 = $req->newpass2;
        if($idkh != null){
            $data = DB::table('customer')->select('password')->where('id',$idkh)->first();
            if (Hash::check($currentpassword , $data->password)) {
                if($newpassword1 == $newpassword2){
                    $model = customer::find($idkh);
                    $model->password = Hash::make($newpassword1);
                    $model->save();
                    Auth::logout();
                    session()->put('login',0);
                    session()->forget('idkh');
                    session()->forget('namekh');
                    return redirect('login');
                }else {
                    $check = 'Nhập Lại Mật Khẩu Không Trùng Khóp';
                    return view('Web/changepass',['check'=>$check]);
                }
            }else {
                $check = 'Mật Khẩu Cũ Nhập Không Đúng';
                return view('Web/changepass',['check'=>$check]);
            }         
        }        
    }
    public function showformmail(){
        $category = DB::table('category')->get();
        return view('Web/forgotpassword',['category'=>$category]);
    }
    public function sendmail(Request $req){        
        $category = DB::table('category')->get();
        $email = $req->email;
        $data = DB::table('customer')->select('email')->where('email',$email)->get();
        if(!$data->isEmpty()){
            session()->put('email',$email);
            $code = Str::random(6);
            $dt = [
                'title'=> 'Mail Từ GreenFood',
                'body'=> 'Green Food Gửi Bạn Mã Code Để Reset Password',
                'code'=> $code
            ];
            session()->put('code',$code);
            if($email != null){
                \Mail::to($email)->send(new \App\Mail\mail($dt));            
            }else{
                \Mail::to(session()->get('email'))->send(new \App\Mail\mail($dt));            
            }
            $check = 1;
            return view('Web/forgotpassword',['category'=>$category,'check'=>$check,'email'=>$email]); 
        }else{
            $error = 1;            
            return view('Web/forgotpassword',['category'=>$category,'error'=>$error]);
        }
    }    
    public function verifycode(Request $req){
        $category = DB::table('category')->get();
        $code = $req->code;
        $codeverify = session()->get('code');
        if($code == $codeverify){
            $check = 2;
            return view('Web/forgotpassword',['category'=>$category,'check'=>$check]); 
        }else{
            $error = 1;            
            $check = 1;
            return view('Web/forgotpassword',['category'=>$category,'error'=>$error,'check'=>$check]);
        }
    }
    public function getpass(Request $req){
        $category = DB::table('category')->get();
        $password1 = $req->password1;
        $password2 = $req->password2;
        $email = session()->get('email');
        if($password1 == $password2){
            $data = DB::table('customer')->select('id')->where('email',$email)->first();
            $model = customer::find($data->id);
            $model->password = Hash::make($password1);
            $model->save();
            return redirect('login'); 
        }else{
            $error = 1;
            $check = 2;            
            return view('Web/forgotpassword',['category'=>$category,'error'=>$error,'check'=>$check]);
        }
    }
    public function showinvoices(){
        $category = DB::table('category')->get();
        $idkh = session()->get('idkh');
        $hoadon = DB::table('orderfood')->where('CustomerID',$idkh)->get();
        return view('user/invoices',['category'=>$category,'hoadon'=>$hoadon]);
    }
    public function showinvoicesdetail(){
        $category = DB::table('category')->get();
        $id = $_GET['id'];
        $hoadondt = DB::table('orderdetail')->where('OrderFoodID',$id)->get();
        return view('user/invoicesdetail',['category'=>$category,'hoadondt'=>$hoadondt]);
    }
}
