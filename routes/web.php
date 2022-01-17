<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\Entrada_AlmacenController;
use App\Http\Controllers\Detalle_ProductoController;

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/almacen_stock', 'App\Http\Controllers\AlmacenController@stock');
Route::get('/almacen_entrada', 'App\Http\Controllers\AlmacenController@entrada');
Route::get('/almacen_salida', 'App\Http\Controllers\AlmacenController@salida');
Route::get('/almacen_detalle_producto', 'App\Http\Controllers\AlmacenController@detalle_producto');
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

Route::apiResource('/stock', StockController::class);
Route::apiResource('/entrada', Entrada_AlmacenController::class);
Route::apiResource('/salida', Entrada_AlmacenController::class);
Route::apiResource('/detalle_producto', Detalle_ProductoController::class);
