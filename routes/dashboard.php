<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\LogoutController;
use App\Http\Controllers\Dashboard\Auth\RegisterController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ModelController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login',[LoginController::class,'index'])->name('dashboard.login.index');
Route::post('admin/login',[LoginController::class,'login'])->name('dashboard.login.check');
Route::get('admin/register',[RegisterController::class,'index'])->name('dashboard.register.index');
Route::post('admin/register',[RegisterController::class,'store'])->name('dashboard.register.store');
Route::post('admin/logout',[LogoutController::class,'logout'])->name('dashboard.logout');
Route::group([
    'middleware'=>['auth:admin'],
    'as'=>'dashboard.',
    'prefix'=>'admin/'
], function () {
    Route::resource('/',DashboardController::class);
    //routes for users
    Route::post('users/change-status/{id}',[UserController::class,'change_user_status'])->name('users.changeStatus');
    Route::resource('/users',UserController::class);

    //routes for admins and vendors
    Route::post('admins/change-status/{id}',[AdminController::class,'change_admin_status'])->name('admins.changeStatus');
    Route::resource('/admins',AdminController::class);

    //route for brands
    Route::resource('/brands',BrandController::class);

    //route for model
    Route::resource('/models',ModelController::class);

    //route for posts
    Route::resource('/posts',PostController::class);

    //route for comments
    Route::resource('/comments',CommentController::class);
}
);
