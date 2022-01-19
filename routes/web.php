<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\pageController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin_dashboard', [App\Http\Controllers\HomeController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('admin_dashboard', [App\Http\Controllers\HomeController::class, 'user_dashboard'])->name('user_dashboard');

//Resource routes
Route::resource('deals', 'DealController');
Route::resource('merchants', 'MerchantController');
Route::resource('categories', 'CategoryController');
Route::resource('orders', 'OrderController');
