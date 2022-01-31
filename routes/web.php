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
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
});

Route::get('/almacen_marca', 'App\Http\Controllers\AlmacenController@marca');
Route::get('/almacen_categoria', 'App\Http\Controllers\AlmacenController@categoria');
Route::get('/almacen_stock', 'App\Http\Controllers\AlmacenController@stock');
Route::get('/almacen_entrada', 'App\Http\Controllers\AlmacenController@entrada');
Route::get('/almacen_salida', 'App\Http\Controllers\AlmacenController@salida');
Route::get('/almacen_detalle_producto', 'App\Http\Controllers\AlmacenController@detalle_producto');

Route::apiResource('/stock', StockController::class);
Route::apiResource('/producto', ProductoController::class);
Route::apiResource('/entrada', Detalles_EntradaController::class);
Route::apiResource('/salida', Detalles_SalidaController::class);
Route::apiResource('/ent', Entrada_AlmacenController::class);
Route::apiResource('/sal', Salida_AlmacenController::class);
Route::apiResource('/detalle_producto', Detalle_ProductoController::class);
Route::apiResource('/marca', MarcaController::class);
Route::apiResource('/categoria', CategoriaController::class);
Route::apiResource('/persona', PersonaController::class);


Route::get('/excelStock', function () {
    return Excel::download(new StockExport, 'StockActual.xlsx');
});
