<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DealController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Resource routes
Route::resource('deals', DealController::class);
Route::resource('merchants', MerchantController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);

//Dashboard routes
Route::get('/admin_dashboard', [App\Http\Controllers\DashboardController::class, 'admin_dashboards'])->name('admin_dashboards');
Route::get('/user_dashboard', [App\Http\Controllers\DashboardController::class, 'user_dashboards'])->name('user_dashboards');

//Favorite routes
Route::post('favorite', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorite.store');
Route::delete('favorite', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favorite.destroy');
Route::get('favorite', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorite.index');
Route::get('favorite', [App\Http\Controllers\FavoriteController::class, 'show'])->name('favorite.show');

//Pages Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('', [App\Http\Controllers\PageController::class, 'index'])->name('home');


