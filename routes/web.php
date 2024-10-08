<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OffersCategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/landingPage' , function(){
    return view('landingPage');
});



