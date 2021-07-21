<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\foodcontroller;
use App\Http\Controllers\MyprofileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Food;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;

//Route::match(['get', 'post'], '/login', [LoginUserController::class, 'login'])->name('loginuser');
Route::post('/login',"LoginUserController@login");
Route::middleware('auth')->group(function (){
    
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form', function () {
    return view('form1');
});
Route::get('/tong','Mathcontroller@sum');
Route::get('/hieu', 'Mathcontroller@Max');
Route::get('/shop/page/{pagenum}','Mathcontroller@page') ;

Route::get('/dangki','dangkicontroller@show');
Route::post('/dangki','dangkicontroller@dangki')->name('dangki');

Route::get('/layout', function(){
    return view('layout_web');

});
 
Route::get('/home','home@home')->name('home');

Route::get('/cart', function(){
    return view('Web/cart');
});

Route::get('/food', 'foodcontroller@show');

Route::get('/Contact',function(){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/Contact',['category'=>$category]);
});

Route::get('/Introduce',function(){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/Introduce',['category'=>$category]);
});

Route::get('/Shoppingguide',function(){
    $category = DB::table('category')->where('avaiable',1)->get();
    $items = session()->get('cart');
    return view('Web/Shoppingguide',['items'=>$items,'category'=>$category]);
});
Route::get('/productdetail',function(){
    return view('Web/productdetail');
});
Route::get('/PaymentGuide', function(){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/PaymentGuide',['category'=>$category]);
});
Route::get('/GeneralPolicy', function (){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/GeneralPolicy',['category'=>$category]);
});
Route::get('/ShippingPolicy', function (){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/ShippingPolicy',['category'=>$category]);
});
Route::get('/ReturnPolicy', function (){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/ReturnPolicy',['category'=>$category]);
});
Route::get('/InformationPrivacy', function (){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/InformationPrivacy',['category'=>$category]);
});

Route::get('/checkout', function(){
    $category = DB::table('category')->where('avaiable',1)->get();
    $cart = session()->get('cart');
    return view('Web/checkout',['category'=>$category,'data'=>$cart]);
});
Route::get('/login', function(){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view('Web/login',['category'=>$category]);
});


Route::get('shop', 'foodcontroller@show');

Route::get('upfile','upfilecontroller@show');
Route::post('upfile','upfilecontroller@up')->name('upfile');

   
Route::get('addtocart','CartController@add');

Route::get('/detail','ShopController@show');

Route::get('/tong','TongController@sum');

Route::post('/tong','Tongcontroller@up');

Route::get('/tong','TongController@result');

Route::get('/addtocart','CartController@add');

Route::get('/cart', 'CartController@show'); 

Route::get('/upquantity', 'CartController@UpQuantity');

Route::get('delitem','CartController@Del');

Route::group(['prefix'=>'/admin'],function(){
   
});

Route::get('/Customer/AddCustomer', 'Customercontroller@showformaddcustomer');
Route::post('/Customer/AddCustomer', 'Customercontroller@addcustomer')->name('customer.add');

 
//Route::get('admin/Category/AddCategory', "Categorycontroller@showformaddcate");

Route::get('/logout','LoginUserController@logout');
Route::get('/addbill','CartController@addbill');

Route::get('/wishlist','DController@showwishlist');
Route::get('addwish','DController@addwish');
Route::post('comment','DController@comment');
Route::get('delete','DController@delete');
Route::get('/myprofile', [MyprofileController::class, 'show']);
Route::post('detail/khachhang/save',[MyprofileController::class, 'edit'])->name('editkh');

Route::get('search','DController@search' )->name('search');
Route::post('hint','DController@hint');
Route::get('changepass', 'DController@showchangepass');
Route::post('changepass','DController@changepass')->name('changepass');

Route::get('forgotpw', 'DController@showformmail');
Route::get('sendemail', function () {
    return view('Web/invalid');
});
Route::get('verifycode', function () {
    return view('Web/invalid');
});
Route::get('getpass', function () {
    return view('Web/invalid');
});
Route::post('sendemail', 'DController@sendmail')->name('sendmail');
Route::post('verifycode', 'DController@verifycode')->name('verifycode');
Route::post('getpass','DController@getpass')->name('getpass');
Route::post('Customer/rgsendemail', 'Customercontroller@sendmail');

Route::get('invoices','DController@showinvoices');
Route::get('invoicesdetail','DController@showinvoicesdetail');
Route::get('session', function () {
    $total = $_GET['total'];
    session()->put('total',$total);
    return 'http://localhost:8080/foodorder/public/checkout';
});
