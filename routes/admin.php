<?php

use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::match(['get', 'post'], '/login', [LoginAdminController::class, 'login'])->name('admin.login');
Route::middleware('auth:admin')->group(function (){   
    Route::get('/', function(){ 
        return view('admin/home');
    })->name('dashboard');
    Route::group(['prefix'=>'/product'],function(){
        Route::get('/index', function(){
            return view("admin/Product/index");
        });
        Route::get('/index',"foodcontroller@index");

        Route::get('/add',function(){
            return view("admin/Product/add");
        });
        Route::post("/add", "foodcontroller@add")->name('food.add');

        Route::get('/edit/{id}','foodcontroller@showformedit');
        Route::post("/edit", "foodcontroller@edit")->name('food.edit');

        Route::get('/delete',function(){
            return view("admin/Product/delete");
        });
        Route::post("/delete", "foodcontroller@delete")->name('food.delete');
    });

    Route::group(['prefix'=>'/customer'],function(){
        Route::get('/index', function(){
            return view("admin/customer/indexcustomer");
        });
        Route::get('/indexcustomer',"Customercontroller@indexcustomer");

        Route::get('/edit/{id}','Customercontroller@showformeditcustomer');
        Route::post("edit", "Customercontroller@editcustomer")->name('customer.edit');


        Route::get('/delete',function(){
            return view("admin/customer/delete");
        });
        Route::post("/delete", "Customercontroller@delete")->name('customer.delete');
    });
    
    Route::group(['prefix'=>'/category'],function(){
        Route::get('/index', function(){
            return view("admin/category/indexcategory");
        });
        Route::get('/indexcategory',"CategoryController@indexcategory");

        Route::get('addcategory', function(){
            return view('admin/category/AddCategory');
        });
        Route::post("addcategory", "Categorycontroller@addcate")->name('category.add'); 
        
        
        Route::get('/edit/{id}','Categorycontroller@showformeditcate');
        Route::post("edit", "Categorycontroller@editcate")->name('category.edit');

        Route::get('/delete',function(){
            return view("admin/Product/delete");
        });
        Route::post("/delete", "foodcontroller@delete")->name('food.delete');
        });
});



Route::get('/logout',function(){
    Auth::logout();
    return redirect('admin/login');
});
Route::get('product/comment/', [MyprofileController::class, 'comment']);
Route::get('product/comment/{id}', [MyprofileController::class, 'showcomment']);
