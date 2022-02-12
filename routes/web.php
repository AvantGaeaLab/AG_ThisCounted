<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\livewire\LiveSearch;
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

Route::get('/', [PageController::class, 'mainPage'])->name('home');

//Method routes
Auth::routes();
Route::get('CheckOrder', [OrderController::class, 'CheckOrder'])->name('CheckOrder');


//Resource routes
Route::resource('deals', DealController::class);
Route::resource('merchants', MerchantController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);

//Dashboard routes
Route::get('/admin_dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('/user_dashboard', [DashboardController::class, 'user_dashboard'])->name('user_dashboard');

//Deals Favorite routes
Route::post('favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('favorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::get('favorites', [FavoriteController::class, 'show'])->name('favorites.show');
//Merchants Favorite routes
Route::post('favorite', [FavoriteController::class, 'MerStore'])->name('MerStore');
Route::delete('favorite', [FavoriteController::class, 'MerDestroy'])->name('MerDestroy');


//Pages Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::any("search",[DealController::class,'search'])->name("deals.search");
Route::get("merchant/{merchant}",[MerchantController::class,'merDeals'])->name("merchants.deals");
Route::get("category/{category}",[CategoryController::class,'catDeals'])->name("categories.deals");
Route::get("food",[PageController::class,'foodPage'])->name("foodPage");
Route::get("Activities",[PageController::class,'activitiesPage'])->name("activitiesPage");

//Payment - Checkout
Route::get('/payment', [PaymentController::class, 'paymentPost'])->name('payment.post');
Route::get('checkout/{deal}', [PaymentController::class, 'checkout'])->name('payment.checkout');
Route::post('/charge', [PaymentController::class, 'charge'])->name('checkout.charge');


