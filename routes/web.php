<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[CustomerController::class,'index'])->name('customer.index');
Route::group(['prefix'=> 'customer'], function(){
    
    Route::get('create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('store',[CustomerController::class,'store'])->name('customer.store');
    Route::get('delete/{id}',[CustomerController::class,'destroy'])->name('customer.delete');
    Route::get('edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::post('updade/{id}',[CustomerController::class,'update'])->name('customer.update');
    // Route::post('search',[CustomerController::class,'search'])->name('customer.search');
});
