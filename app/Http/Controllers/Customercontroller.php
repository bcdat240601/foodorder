<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

use DB;
class Customercontroller extends Controller
{
    public function indexcustomer(){
        $data = customer::select("id","CustomerName","Address","Phone","Email","Password")->get();
        return view("admin/customer/indexcustomer",["data"=>$data]);
    }
    public function addcustomer(Request $req){

        $CustomerName = $req -> CustomerName;
        $Address = $req -> Address;
        $Phone = $req -> Phone;
        $Email = $req -> Email;
        $Password = $req -> Password;

        $customer = new customer();
        
        $customer -> CustomerName = $CustomerName;
        $customer -> Address = $Address;
        $customer -> Phone = $Phone;
        $customer -> email = $Email;
        $customer -> password = bcrypt($Password);

        $customer ->save();
        return view("Admin/Customer/AddCustomer");

    }
    public function showformaddcustomer(){
        return view("Admin/Customer/AddCustomer");
    }

    public function editcustomer(Request $req){
        $customer = customer::find($req->id);
        
        
        $customer -> CustomerName = $req -> CustomerName;
        $customer -> Address = $req -> Address;
        $customer -> Phone = $req -> Phone;
        $customer -> Email = $req -> Email;
        $customer -> Password = $req -> Password;

        
        $customer ->save();       
        return redirect("admin/customer/edit/".$req->id);
    }
    public function showformeditcustomer($id){
        $data = customer::find($id);
        return view('Admin/Customer/EditCustomer',['data'=>$data]);
    }
}