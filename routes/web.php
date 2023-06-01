<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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
Route::resource('/', LandingpageController::class);

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::resource('/shop',ShopController::class);

    Route::resource('product',ProductController::class);
    Route::resource('profile',UserController::class);
    Route::resource('cart',CartController::class);
    Route::resource('transaksi',TransaksiController::class);
    Route::put('password{id}',[UserController::class,'password'])->name('password');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('app',[UserController::class,'sandi']);
    Route::get('updatecart',[CartController::class,'updatecart']);
    Route::get('/shop/category/{id}', [ShopController::class,'category']);
    Route::post('checkout',[CartController::class,'checkout']);
});

Route::get('productlogin',[ProductController::class,'login'])->name('loginfisrt');
Route::get('contact',[UserController::class,'contact'])->name('contact');
Route::post('send',[UserController::class,'send'])->name('send');


