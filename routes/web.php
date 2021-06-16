<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
    Route::get('admin/logout',function(){
        session()->forget('Admin_login');
        session()->forget('Admin_id');
        session()->flash('error', 'Loggout Done');
        return redirect('admin/dashboard');
    })->name('admin.logout');
});

