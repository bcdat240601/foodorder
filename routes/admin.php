<?php

use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\foodcontroller;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::match(['get', 'post'], '/login', [LoginAdminController::class, 'login'])->name('admin.login');
Route::middleware('auth:admin')->group(function (){
    Route::get('/',[HomeController::class, 'index'])->name('dashboard');
    Route::group(['prefix'=>'/product'],function(){
        Route::get('/index', function(){
            return view("admin/Product/index");
        });
        Route::get('/index',"foodcontroller@index");

        Route::get('/add',function(){
            $category = DB::table('category')->where('avaiable',1)->get();
            return view("admin/Product/add",['category'=>$category]);
        });
        Route::post("/add", "foodcontroller@add")->name('food.add');

        Route::get('/edit/{id}','foodcontroller@showformedit');
        Route::post("/edit", "foodcontroller@edit")->name('food.edit');

        // Route::get('/delete',function(){
        //     return view("admin/Product/delete");
        // });
        // Route::post("/delete", "foodcontroller@delete")->name('food.delete');
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



Route::get('/logout',[LoginAdminController::class,'logout']);
Route::get('product/comment/', [MyprofileController::class, 'comment']);
Route::get('product/comment={id}', [MyprofileController::class, 'showcomment']);
Route::get('product/comment/delete', [MyprofileController::class, 'deletecmt']);

Route::get('product/thongke', function(){
    $category = DB::table('category')->where('avaiable',1)->get();
    return view("admin/thongke",['category'=>$category]);
});
Route::get('thongkeloai',[MyprofileController::class, 'thongkeloai'])->name('thongketheoloai');
Route::get('thongketatca',[MyprofileController::class, 'thongke'])->name('thongketatca');

Route::get('/myaccount', [MyprofileController::class, 'account']);
Route::post('edit/admin',[MyprofileController::class, 'editadmin'])->name('editadmin');
Route::get('/aha', [MyprofileController::class, 'home']);

Route::get('product/food/delete', [MyprofileController::class, 'deletefood']);
Route::get('product/food/on', [MyprofileController::class, 'sellfood']);
Route::get('customer/cus/delete', [MyprofileController::class, 'deletecus']);
Route::get('category/cat/delete', [MyprofileController::class, 'deletecat']);
Route::get('category/cat/on', [MyprofileController::class, 'oncat']);

Route::get('customer/bill={id}', [MyprofileController::class, 'showbill']);
Route::get('customer/debl={id}', [MyprofileController::class, 'detailbill']);
Route::get('customer/bill/delete', [MyprofileController::class, 'deletebill']);
Route::get('customer/comm={id}', [MyprofileController::class, 'showbl']);
Route::get('customer/comm/delete', [MyprofileController::class, 'deletebl']);
Route::get('customer/detailbill/delete', [MyprofileController::class, 'deletede']);