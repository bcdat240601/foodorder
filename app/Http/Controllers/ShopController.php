<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class ShopController extends Controller
{
    public function show(){
        $id = $_GET['id'];
        $data=Food::find($id);
        return view('web/ProductDetail',["data"=>$data]);
    }

}
