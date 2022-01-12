<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('layouts.admin');
});


Route::get('/principal', function () {
    return view('layouts.principal');
});

Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Route::get('/home', 'App\Http\Controllers\AlmacenController@stock');
Route::get('/entrada', 'App\Http\Controllers\AlmacenController@entrada');
