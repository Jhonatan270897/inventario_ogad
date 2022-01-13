<?php

use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mos', 'App\Http\Controllers\AlmacenController@stock');
Route::get('/entrada', 'App\Http\Controllers\AlmacenController@entrada');
Route::get('/salida', 'App\Http\Controllers\AlmacenController@salida');
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

Route::apiResource('/stock', StockController::class);
