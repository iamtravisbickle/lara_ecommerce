<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['AdminAuth']], function() {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});

Route::get('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/login', [AuthController::class, 'authenticate']);
Route::get('/admin/logout', [AuthController::class, 'logout']);

Route::get('/', [CustomerController::class, 'index']);
Route::get('/category', [CustomerController::class, 'category']);
Route::get('/product_detail/{product_detail}', [CustomerController::class, 'product_detail']);

// Cart Route
Route::post('/addToCart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/clearCart/{item_id}', [CartController::class, 'clearCart']);
Route::get('/deleteCart', [CartController::class, 'deleteCart']);


Route::get('/checkout', [CustomerController::class, 'checkout']);
Route::get('/contact', [CustomerController::class, 'contact']);