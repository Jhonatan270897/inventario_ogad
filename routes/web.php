<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\Detalles_EntradaController;
use App\Http\Controllers\Detalles_SalidaController;
use App\Http\Controllers\Detalle_ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\Entrada_AlmacenController;
use App\Http\Controllers\Salida_AlmacenController;


use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/almacen_marca', 'App\Http\Controllers\AlmacenController@marca');
Route::get('/almacen_categoria', 'App\Http\Controllers\AlmacenController@categoria');
Route::get('/almacen_stock', 'App\Http\Controllers\AlmacenController@stock');
Route::get('/almacen_entrada', 'App\Http\Controllers\AlmacenController@entrada');
Route::get('/almacen_salida', 'App\Http\Controllers\AlmacenController@salida');
Route::get('/almacen_detalle_producto', 'App\Http\Controllers\AlmacenController@detalle_producto');
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

Route::apiResource('/stock', StockController::class);
Route::apiResource('/producto', ProductoController::class);
Route::apiResource('/entrada', Detalles_EntradaController::class);
Route::apiResource('/salida', Detalles_SalidaController::class);
Route::apiResource('/ent', Entrada_AlmacenController::class);
Route::apiResource('/sal', Salida_AlmacenController::class);
Route::apiResource('/detalle_producto', Detalle_ProductoController::class);
Route::apiResource('/marca', MarcaController::class);
Route::apiResource('/categoria', CategoriaController::class);
