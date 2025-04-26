<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Landing Page
    return view('welcome');
});

Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');

// Order
Route::get('/order/add', [\App\Http\Controllers\OrderController::class, 'addView'])->name('order.add');


// Search
Route::get('/search', [ProductController::class, 'index'])->name('search');
Route::get('/products', [ProductController::class, 'getProducts'])->name('products.get');
