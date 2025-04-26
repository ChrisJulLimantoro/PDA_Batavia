<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Order
Route::get('/order/add', [OrderController::class, 'addView'])->name('order.add');
Route::post('/order/add', [OrderController::class, 'add'])->name('order.add.post');
Route::get('/order/payment', [OrderController::class, 'payment'])->name('order.payment');
Route::post('/order/payment', [OrderController::class, 'save'])->name('order.payment.save');
Route::get('/order/custom', [OrderController::class, 'custom'])->name('order.custom');
Route::post('/order/custom', [OrderController::class, 'customSave'])->name('order.custom.post');


// Search
Route::get('/products', [ProductController::class, 'index'])->name('search');
Route::get('/getProducts', [ProductController::class, 'getProducts'])->name('products.get');
