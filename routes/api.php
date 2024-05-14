<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users', 'controller' => UserController::class], function () {
    
    Route::get('/', 'index');
    Route::get('/{user}', 'show');
    Route::post('/', 'store');
    Route::put('/{user}', 'update');
    Route::delete('/{user}', 'destroy');
});

Route::group(['prefix' => 'products', 'controller' => ProductController::class], function () {
    
    Route::get('/', 'index');
    Route::get('/{product}', 'show');
    Route::post('/', 'store');
    Route::put('/{product}', 'update');
    Route::delete('/{product}', 'destroy');
});

Route::group(['prefix' => 'categories', 'controller' => ProductController::class], function () {
    
    Route::get('/', 'index');
    Route::get('/{category}', 'show');
    Route::post('/', 'store');
    Route::put('/{category}', 'update');
    Route::delete('/{category}', 'destroy');
});

Route::group(['prefix' => 'cart', 'controller' => CartController::class], function () {
    
    Route::get('/', 'shop');
    // Route::get('/{category}', 'show');
    // Route::post('/', 'store');
    // Route::put('/{category}', 'update');
    // Route::delete('/{category}', 'destroy');
});
