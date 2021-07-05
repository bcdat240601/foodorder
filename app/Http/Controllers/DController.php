<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\wishlist;
use App\Models\binhluan;
use DB;

class DController extends Controller
{
    public function showwishlist(){
        $idkh = session()->get('idkh');
        $category = Category::where([['id','>',1],['id','<',9]])->get();
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
        $category = Category::where([['id','>',1],['id','<',9]])->get();
        $search = $_GET['search'];
        $data = DB::table('food')->where('FoodName','LIKE',"%{$search}%")->paginate(9);
        return view ("Web/Shop", ["data"=>$data,'category'=>$category,'search'=>$search]);
    }
    public function hint(Request $req){
        $hint = $req->gethint;
        if($hint != null){
            $data = DB::table('food')->select('id','FoodName')->where('FoodName','LIKE',"%{$hint}%")->get();
            if(!$data->isEmpty()){
                $output = '<ul class="dropdown-menu" style="display:block">';        
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

}
