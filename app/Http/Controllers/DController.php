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
        return '<h3 class="name">'.$cusname.'</h3>
        <span class="cmt" style="display:block">'.$req->loibinhluan.'</span>';

    }    
}
