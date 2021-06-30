<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mathcontroller extends Controller
{
    //
    public function sum(){
        $a=1;
        $b=2;
        echo $a-$b;
    }
    public function max(){
        $a=3;
        $b=4;
        echo $a-$b;
    }
    public function page($pagenum){
        echo'trang',$pagenum;
    }
}
