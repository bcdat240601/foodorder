<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

use DB;
class foodcontroller extends Controller
{
    public function show($name_food){
        $data=null;
        if($name_food=="all")
            $data = Food::paginate(9);
        else if($name_food=="freshfood")
            $data = Food::where('CategoryID','=',2)->paginate(9);
        else if($name_food=="meat")
            $data = Food::where('CategoryID','=',3)->paginate(9);
        else if($name_food=="fruit")
            $data = Food::where('CategoryID','=',4)->paginate(9);
        else if($name_food=="seafood")
            $data = Food::where('CategoryID','=',5)->paginate(9);
        else if($name_food=="cannerfood")
            $data = Food::where('CategoryID','=',6)->paginate(9);
        else if($name_food=="vegetables")
            $data = Food::where('CategoryID','=',7)->paginate(9);
        else if($name_food=="drinks")
            $data = Food::where('CategoryID','=',8)->paginate(9);

        return view ("Web/Shop", ["data"=>$data]);
    }
    public function index(){
        $data = food::select("id","FoodName","Price","Quantity","CategoryID","Image_Name")->get();
        return view("admin/product/index",["data"=>$data]);
    }
    public function add(Request $req){
      
        $FoodName = $req -> FoodName;
        $Price = $req -> Price;
        $Description = $req -> Description;
        $Quantity = $req -> Quantity;
        $CategoryID = $req -> CategoryID;       
        $Image_Name = $req -> Image_Name;
       

        
        $food = new food();

        $food -> Foodname = $FoodName;
        $food -> Price = $Price;
        $food -> Description = $Description;
        $food -> Quantity = $Quantity;
        $food -> CategoryID = $CategoryID;
        $food -> Image_Name = $Image_Name ->getClientOriginalName();
        
        $Image_Name->move('images/product-details', $Image_Name ->getClientOriginalName());

        $food -> save();
        return view("admin/product/add");

        
    }

    public function Edit(Request $req){
        $food = food::find($req->id);

        $food -> FoodName = $req -> FoodName;
        $food -> Price = $req -> Price;
        $food -> Description = $req -> Description;
        $food -> Quantity = $req -> Quantity;
        $food -> CategoryID = $req -> CategoryID;
        if ($req->hasFile('Image_Name'))
        {
            $Image_Name = $req -> Image_Name;
            $food -> Image_Name = $Image_Name ->getClientOriginalName();
            $Image_Name->move('images/product-details', $Image_Name->getClientOriginalName());
        }

        $food ->save();
        return redirect ("admin/product/edit/".$req->id);
    }


    public function showformadd(){
        return view('food/add');
    }
    public function showformedit($id){
        $data = food::find($id);
        return view('admin/Product/edit', ['data'=>$data]);
    }
    public function delete(){
        
    }
    public function detail(){

    }
}
