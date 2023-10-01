<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::post('/cart/{product_id}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product_id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('/order', [CartController::class, 'order'])->name('cart.order');

    Route::post('/product', [ProductController::class, 'store'])->middleware('admin')->name('product.store');
    Route::delete('/product/{product_id}', [ProductController::class, 'delete'])->middleware('admin')->name('product.delete');
    Route::patch('/product/{product_id}', [ProductController::class, 'edit'])->middleware('admin')->name('product.edit');
});

Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

