<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', function () {
    //kasih name biar bisa diakses route name yg di login and sign up
    return view('login');
})->name('login');

Route::get('checkout', function () {
    //kasih name biar bisa diakses route name yg di login and sign up
    return view('checkout');
})->name('checkout');

Route::get('success-checkout', function () {
    //kasih name biar bisa diakses route name yg di login and sign up
    return view('success_checkout');
})->name('success-checkout');