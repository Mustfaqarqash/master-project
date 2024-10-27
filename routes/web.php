<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OffersCategoryController;
use App\Http\Controllers\OffersFavoriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFavoriteController;
use App\Http\Controllers\ProductFeedBackController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::Get('auth/google' , [GoogleAuthController::class , 'redirectToGoogle'])->name('auth-google');
Route::Get('/auth/google/call-back' , [GoogleAuthController::class , 'handleGoogleCallback']);

Route::resource('/users', UserController::class);
Route::resource('/analytics' , AnalyticsController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/subCategory' , SubCategoryController::class);
Route::resource('/stores', StoreController::class);
Route::resource('/product', ProductController::class);
Route::resource('/offer', OfferController::class);
Route::resource('/offersCategory', OffersCategoryController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('account', [UserController::class, 'showAccount'])->name('account.show');
    Route::post('account/update', [UserController::class, 'updateAccount'])->name('account.update');
    Route::post('account/deactivate', [UserController::class, 'deactivateAccount'])->name('account.deactivate');
});

Route::get('/landingPage' , [LandingPageController::class , 'index'])->name('landingPage');

Route::post('/offers/{offer}/favorite', [OffersFavoriteController::class, 'store'])->name('offers.favorite');
Route::get('/productDetails/{id}', [productController::class, 'showUserSide'])->name('productDetails');


Route::post('/favorites/add', [ProductFavoriteController::class, 'store'])->name('favorites.add');
Route::delete('/favorites/remove/{id}', [ProductFavoriteController::class, 'destroy'])->name('favorites.remove');
Route::post('/product/feedback', [ProductFeedBackController::class, 'store'])->name('product.feedback.store');


Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('cart/clear', [CartController::class, 'clear'])->name('cart.clear');






