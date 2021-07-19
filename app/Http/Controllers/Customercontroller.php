<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Category;
use Illuminate\Support\Str;

use DB;
class Customercontroller extends Controller
{
    public function indexcustomer(){
        $data = customer::select("id","CustomerName","Address","Phone","Email","Password")->get();
        return view("admin/customer/indexcustomer",["data"=>$data]);
    }
    public function addcustomer(Request $req){
        $checkemail = DB::table('customer')->select('email')->get();
        foreach ($checkemail as $value) {
            if($value->email == $req -> Email){                
                return 2;
            }
        }
        $code = session()->get('rgcode');
        if($code != $req->code){
            return $req->code;
        }                    
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
        return 3;

    }
    public function showformaddcustomer(){
        $category = Category::where([['id','>',1],['id','<',9]])->get();
        return view("Admin/Customer/AddCustomer",['category'=>$category]);
    }

    public function editcustomer(Request $req){
        $customer = customer::find($req->id);
        
        
        $customer -> CustomerName = $req -> CustomerName;
        $customer -> Address = $req -> Address;
        $customer -> Phone = $req -> Phone;
        $customer -> Email = $req -> Email;        

        
        $customer ->save();       
        return redirect("admin/customer/edit/".$req->id);
    }
    public function showformeditcustomer($id){
        $data = customer::find($id);
        return view('Admin/Customer/EditCustomer',['data'=>$data]);
    }
    public function sendmail(Request $req){
        $email = $req->email;        
        $code = Str::random(6);
        $dt = [
            'title'=> 'Mail Từ GreenFood',
            'body'=> 'Green Food Gửi Bạn Mã Code Để Đăng Kí Tài Khoản',
            'code'=> $code
        ];
        session()->put('rgcode',$code);
        \Mail::to($email)->send(new \App\Mail\mail($dt));            
    }
}
