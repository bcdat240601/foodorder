<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\foodcontroller;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('Web/Contact');
});

Route::get('/Introduce',function(){
    return view('Web/Introduce');
});

Route::get('/Shoppingguide',function(){
    return view('Web/Shoppingguide');
});
Route::get('/productdetail',function(){
    return view('Web/productdetail');
});
Route::get('/PaymentGuide', function(){
    return view('Web/PaymentGuide');
});
Route::get('/GeneralPolicy', function (){
    return view('Web/GeneralPolicy');
});
Route::get('/ShippingPolicy', function (){
    return view('Web/ShippingPolicy');
});
Route::get('/ReturnPolicy', function (){
    return view('Web/ReturnPolicy');
});
Route::get('/InformationPrivacy', function (){
    return view('Web/InformationPrivacy');
});

Route::get('/checkout', function(){
    return view('Web/checkout');
});
Route::get('/login', function(){
    return view('Web/login');
});


Route::get('/shop/{name_food}', 'foodcontroller@show');

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



