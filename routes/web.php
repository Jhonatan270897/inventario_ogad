<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/index', function () {
    return view('almacen.index');
});

Route::get('/principal', function () {
    return view('layouts.principal');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', 'App\Http\Controllers\AlmacenController@index');
