<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dangkicontroller extends Controller
{
    //
    public function Show(){
        return view('form1');
    }
    public function dangki(Request $req){
        echo "<br>Tên".$req -> Name;
        echo "<br>Phone".$req -> Phonenumber;
        echo "<br>Email".$req -> Email;
        echo "<br>Add".$req -> Address;
    }
}