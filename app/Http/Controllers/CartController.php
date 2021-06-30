<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Food;

class CartController extends Controller
{
    
    public function add(){
        if (isset($_GET["id"]))
        {
            $id = $_GET["id"];
            $sl = $_GET["sl"];
            $price = $_GET["price"];
            $name =$_GET["name"];
            //echo "Đã thêm vào giỏ hàng".$id."\t Soluong:".$sl."\t price".$price;
            $pos = $this->isExists($id);
            $cart = session()->get('cart');
            echo $id;
            
            if($pos==-1){
                $item = new Item();
                $item ->id=$id;
                $item ->price=$price;
                $item ->quantity= $sl;
                $item -> name=$name;
                session()->push("cart",$item);
            }
            else{
                $cart[$pos]->quantity = $cart[$pos]->quantity+$sl;
            }
            $cart=session()->get('cart');
            // foreach ($cart as $item) {
            //     echo"id:".$item->id."\n";
            //     echo"price:".$item->price."\n";
            //     echo"quantity:".$item->quantity."\n";
            // }
        }
    }
    public function isExists($id){
        $cart=session()->get('cart');
        $found = -1;
        if($cart!=null)
        {
            foreach ($cart as $key => $value) {
                if($value->id == $id) {
                    $found = $key;
                    break;
                }
            }
        }
        return $found;
    }
    public function show(){
        $cart= session()->get("cart");
        return view('web/Cart',['data'=>$cart]);
    }
    public function UpQuantity()
    {
        $id = $_GET["id"];
        $sl = $_GET["sl"];
        $pos = $this->isExists($id);
        $cart = session()->get('cart');
   
        $cart[$pos]->quantity= $sl;
        echo  $cart[$pos]->getSubTotal();
  

    
    }
    public function Del(){
        $id= $_GET['id'];
        $pos = $this->isExists($id);
       
        $cart = session()->get('cart');
        if ($pos!=-1) {
            
            $i =0;
            unset($cart[$pos]);
            session()->put("cart",$cart);
            // session()->pull('cart.2');
            
            
            
            // foreach ($cart as $item) {
            //     echo"id:".$item->id."\n";
            //     echo"price:".$item->price."\n";
            //     echo"quantity:".$item->quantity."\n";
            // }
            
            // session()->pull('cart', []);
            
            // session()->put('cart', $cart);
            
            echo"The product has been removed from the cart";
        }
        

        
        
    }
    
}







  
