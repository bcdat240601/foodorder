<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexcategory(){
        $data = category::select("id","CatagoryName","Description")->get();
        return view("admin/category/indexcategory",["data"=>$data]);
    }
    public function addcate(Request $req){

        $CatagoryName = $req -> CatagoryName;
        $Description = $req -> Description;

        $Category = new category();
        $Category -> CatagoryName = $CatagoryName;
        $Category -> Description = $Description;

        $Category ->save();
        return view("admin/Category/AddCategory");
    }

    public function editcate(Request $req){
        $Category = category::find($req->id);
        
        $Category -> CatagoryName = $req -> CatagoryName;
        $Category -> Description = $req -> Description;

        $Category -> save();
        return redirect("admin/category/edit/".$req->id);
    }

    public function showformaddcate(){
        return view("admin/Category/AddCategory");
    }

    public function showformeditcate($id){
        $data = category::find($id);
        return view('Admin/Category/EditCategory',['data'=>$data]);
    }
}
