<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class upfilecontroller extends Controller
{
    public function show(){
        return view('Web/Up');
    }       
    public function up(Request $request)
    {
          if ($request->hasFile('file')){
            $file= $request->file; 
            echo "tenfile".$file->getClientOriginalName();

          }
    }    
}
