<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CoupanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function (){
    return view('welcome');
});
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::middleware(['admin_auth'])->group(function () {
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category'); 
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category'])->name('manage_category');
    Route::post('admin/category/create',[CategoryController::class,'store'])->name('category.create'); 
    Route::get('admin/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete'); 
    Route::get('admin/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit'); 
    Route::post('admin/category/update/{id}',[CategoryController::class,'update'])->name('category.update'); 

    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);
    Route::get('admin/coupan/status/{status}/{id}',[CoupanController::class,'status']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);

    Route::get('admin/coupan',[CoupanController::class,'index'])->name('admin.coupan'); 
    Route::get('admin/coupan/manage_coupan',[CoupanController::class,'manage_coupan'])->name('manage_coupan');
    Route::post('admin/coupan/create',[CoupanController::class,'store'])->name('coupan.create'); 
    Route::get('admin/coupan/delete/{id}',[CoupanController::class,'destroy'])->name('coupan.delete'); 
    Route::get('admin/coupan/edit/{id}',[CoupanController::class,'edit'])->name('coupan.edit'); 
    Route::post('admin/coupan/update/{id}',[CoupanController::class,'update'])->name('coupan.update'); 

    Route::get('admin/size',[SizeController::class,'index'])->name('admin.size'); 
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size'])->name('manage_size');
    Route::post('admin/size/create',[SizeController::class,'store'])->name('size.create'); 
    Route::get('admin/size/delete/{id}',[SizeController::class,'destroy'])->name('size.delete'); 
    Route::get('admin/size/edit/{id}',[SizeController::class,'edit'])->name('size.edit'); 
    Route::post('admin/size/update/{id}',[SizeController::class,'update'])->name('size.update'); 

    Route::get('admin/color',[ColorController::class,'index'])->name('admin.color'); 
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color'])->name('manage_color');
    Route::post('admin/color/create',[ColorController::class,'store'])->name('color.create'); 
    Route::get('admin/color/delete/{id}',[ColorController::class,'destroy'])->name('color.delete'); 
    Route::get('admin/color/edit/{id}',[ColorController::class,'edit'])->name('color.edit'); 
    Route::post('admin/color/update/{id}',[ColorController::class,'update'])->name('color.update'); 

    Route::get('admin/product',[ProductController::class,'index'])->name('admin.product'); 
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product'])->name('manage_product');
    Route::post('admin/product/create',[ProductController::class,'store'])->name('product.create'); 
    Route::get('admin/product/delete/{id}',[ProductController::class,'destroy'])->name('product.delete'); 
    Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit'); 
    Route::post('admin/product/update/{id}',[ProductController::class,'update'])->name('product.update'); 
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);


    Route::get('admin/logout',function(){
        session()->forget('Admin_login');
        session()->forget('Admin_id');
        session()->flash('error', 'Loggout Done');
        return redirect('admin/dashboard');
    })->name('admin.logout');
});

