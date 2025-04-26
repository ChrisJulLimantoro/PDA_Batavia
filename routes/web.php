<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Landing Page
    return view('welcome');
});

Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');

//Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Order
Route::get('/order/add', [\App\Http\Controllers\OrderController::class, 'addView'])->name('order.add');


