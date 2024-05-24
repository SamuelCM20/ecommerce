<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [ProductController::class, 'home'])->name('products.home');
Route::get('/info/{product}',[ProductController::class, 'info'])->name('products.info');
Route::get('/search',[ProductController::class, 'search'])->name('products.search');


Route::group(['middleware' => ['auth']], function () {
Route::get('/cart', [ProductController::class, 'cart'])->name('products.cart');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile',[UserController::class, 'profile'])->name('users.profile');


Route::group(['prefix' => 'users','middleware' =>['role:admin'],'controller'=>UserController::class], function () {
	Route::get('/','index')->name('users.index')->middleware('can:users.index');
	Route::get('/show/{user}', 'show')->name('users.show')->middleware('can:users.show');
	Route::post('/store', 'store')->name('users.store')->middleware('can:users.store');
	Route::post('/update/{user}', 'update')->name('users.update')->middleware('can:users.update');
	Route::delete('/{user}', 'destroy')->name('users.destroy')->middleware('can:users.destroy');
});


Route::group(['prefix' => 'products','controller'=>ProductController::class], function () {
	Route::get('/','index')->name('products.index')->middleware('can:products.index');	
	Route::post('/store', 'store')->name('products.store')->middleware('can:products.store');
	Route::post('/update/{product}', 'update')->name('products.update')->middleware('can:products.update');
	Route::delete('/{product}', 'destroy')->name('products.destroy')->middleware('can:products.destroy');
});

Route::group(['prefix' => 'categories','controller'=>CategoryController::class], function () {
	Route::get('/','index')->name('categories.index')->middleware('can:categories.index');
	Route::get('/allProducts/{category}','allProducts')->name('categories.allProducts');
	Route::post('/', 'store')->name('categories.store')->middleware('can:categories.store');
	Route::put('/{category}', 'update')->name('categories.update')->middleware('can:categories.update');
	Route::delete('/{category}', 'destroy')->name('categories.destroy')->middleware('can:categories.destroy');
});
});