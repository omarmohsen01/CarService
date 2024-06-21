<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CarTuningController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SocialController;
use App\Http\Controllers\Front\SparePartController;
use Illuminate\Foundation\Console\AboutCommand;
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
Route::group([
    'middleware'=>['auth:web'],
], function () {
    Route::post('logout',[AuthController::class,'logout'])->name('logout');

    //checkout
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
    Route::post('/checkout/pay',[CheckoutController::class,'pay'])->name('checkout.pay');

    //cart
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/add-to-cart/{id}',[CartController::class,'add_to_cart'])->name('cart.add_to_cart');

    //media
    Route::get('/posts',[SocialController::class,'index'])->name('posts.index');
    Route::get('/posts/show/{id}',[SocialController::class,'show'])->name('posts.show');
    Route::post('/post/comment/{id}',[SocialController::class,'comment'])->name('post.comment');

    //car tuning
}
);
//home routes
Route::get('/',[HomeController::class,'index'])->name('home');

//spare part routes
Route::get('/spare-parts',[SparePartController::class,'index'])->name('sapre-parts.index');
Route::get('/spare-part-details/{id}',[SparePartController::class,'show'])->name('sapre-part.show');

Route::get('/car-tuning-service',[CarTuningController::class,'index'])->name('car_tuning.index');

Route::get('register',[AuthController::class,'register_index'])->name('register.index');
Route::post('register',[AuthController::class,'register_store'])->name('register.store');
Route::get('login',[AuthController::class,'register_index'])->name('login.index');
Route::post('login',[AuthController::class,'login_store'])->name('login.store');

Route::get('about',[AboutController::class,'index'])->name('about.index');
