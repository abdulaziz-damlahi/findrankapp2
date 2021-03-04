<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\homepage@index');
Route::get('/home', 'App\Http\Controllers\homepage@index');
Route::get('/panel', 'App\Http\Controllers\panel@index')->name('panel');
Route::get('/login', 'App\Http\Controllers\Login@index')->name('login');
Route::get('/profile', 'App\Http\Controllers\panel@profile')->name('profile');
Route::get('/settings', 'App\Http\Controllers\settings@index');
Route::get('/contact', 'App\Http\Controllers\contact@index');
Route::get('/findorder', 'App\Http\Controllers\panel@FindOrder');


Route::get('/users-packet', 'App\Http\Controllers\panel@userspacket');
Route::get('/users-website', 'App\Http\Controllers\panel@userswebsite');
Route::get('/packet-website', 'App\Http\Controllers\panel@packetwebsite');
Route::get('/website-keyword', 'App\Http\Controllers\panel@websitekeyword');




