<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\NewsController;
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

// All User Access
Route::get('/', [LandingpageController::class, 'landingpage']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/fashion', [FashionController::class, 'fashion']);
Route::get('/news', [NewsController::class, 'news']);
Route::get('/contact', [ContactController::class, 'contact']);

Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product-detail');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    // All User Access
    Route::put('/user/edit/profile/{id}', [UserController::class, 'update'])->name('edit.profile');
    Route::put('/user/edit/password/{id}', [UserController::class, 'updatePassword'])->name('edit.password');

    Route::resource('cart-list', CartController::class);
    Route::get('cart-list-delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Admin Only
    Route::resource('product-table', ProductController::class);
    Route::post('product-table-search', [ProductController::class, 'tableSearch'])->name('product-table.search');
    Route::get('product-table-delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::resource('category-table', CategoryController::class);
    Route::get('category-table-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::resource('user-table', UserController::class);
    Route::get('user-table-delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Route::resource('product',ProductController::class);
    // Route::resource('profile',UserController::class);
    // Route::resource('cart',CartController::class);
    // Route::resource('transaksi',TransaksiController::class);
    // Route::put('password{id}',[UserController::class,'password'])->name('password');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('app',[UserController::class,'sandi']);
    // Route::get('updatecart',[CartController::class,'updatecart']);
    // Route::get('/shop/category/{id}', [ShopController::class,'category']);
    // Route::post('checkout',[CartController::class,'checkout']);
});

// Route::get('productlogin',[ProductController::class,'login'])->name('loginfisrt');
// Route::get('contact',[UserController::class,'contact'])->name('contact');
// Route::post('send',[UserController::class,'send'])->name('send');
