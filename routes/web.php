<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [App\Http\Controllers\PageController::class, 'mainPage'])->name('home');

//Method routes
Auth::routes();
Route::get("search",[DealController::class,'search'])->name("deals.search");
Route::get('CheckOrder', [App\Http\Controllers\OrderController::class, 'CheckOrder'])->name('CheckOrder');


//Resource routes
Route::resource('deals', DealController::class);
Route::resource('merchants', MerchantController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);
Route::resource('favorites', FavoriteController::class);

//Dashboard routes
Route::get('/admin_dashboard', [App\Http\Controllers\DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('/user_dashboard', [App\Http\Controllers\DashboardController::class, 'user_dashboard'])->name('user_dashboard');

//Favorite routes
Route::post('favorite', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorite.store');
Route::delete('favorite', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favorite.destroy');
Route::get('favorite', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorite.index');
Route::get('favorite', [App\Http\Controllers\FavoriteController::class, 'show'])->name('favorite.show');

//Pages Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


