<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\homepage@index');
Route::get('/home', 'App\Http\Controllers\homepage@index');
Route::get('/panel', 'App\Http\Controllers\panel@index');
Route::get('/profile', 'App\Http\Controllers\panel@profile');
Route::get('/contact', 'App\Http\Controllers\homepage@contact');




