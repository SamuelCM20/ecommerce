<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'home']);
Route::get('/home', [ProductController::class, 'home'])->name('home');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
