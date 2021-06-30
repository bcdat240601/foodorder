<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class tongcontroller extends Controller
{
    public function sum(){
        return view('Web/Tong');
    }
    public function up(Request $req){
        $Result = $req->a+$req->b;
        session()->put("tong",$Result);
        echo session()->get("tong");   

    }
    public function result(){
        return view('Web/Tong');
    }
   

}
