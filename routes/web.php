<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::group(['as' => 'frontend.'], function () {

    Route::get('/',                     [FrontendHomeController::class, 'index'])->name('home');

    Route::resource('/about',           AboutController::class);

    Route::resource('/contact-us',      ContactUsController::class);

    Route::resource('/categories',      FrontendCategoryController::class);

    Route::resource('/posts',           FrontendPostController::class);
    Route::get('/posts/{slug}',         [FrontendPostController::class, 'show'])->name('posts.display');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/dashboard',        [HomeController::class, 'index'])->name('dashboard');

    Route::resource('categories',   CategoryController::class);

    Route::resource('tags',         TagController::class);

    Route::resource('posts',        PostController::class);
});