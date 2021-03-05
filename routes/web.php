<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user/')->middleware('isAdmin')->group(function(){
    Route::get('/panel', 'App\Http\Controllers\panel@index')->name('panel');
    Route::get('/findorder', 'App\Http\Controllers\panel@FindOrder');
    Route::get('/settings', 'App\Http\Controllers\settings@index')->name('settings');
    Route::get('/profile', 'App\Http\Controllers\panel@profile')->name('profile');
    Route::get('/logout','App\Http\Controllers\Login@logout')->name('logout');

});
Route::prefix('user/')->middleware('isLogin')->group(function() {
    Route::get('/login', 'App\Http\Controllers\Login@index')->name('login');
    Route::post('/login', 'App\Http\Controllers\Login@Loginpost')->name('login.post');
    Route::post('/register', 'App\Http\Controllers\Login@registerPost')->name('register.post');
});

Route::get('/', 'App\Http\Controllers\homepage@index')->name('home');
Route::get('/home', 'App\Http\Controllers\homepage@index');
Route::get('/contact', 'App\Http\Controllers\contact@index')->name('contact');

Route::get('/users-packet', 'App\Http\Controllers\panel@userspacket');
Route::get('/users-website', 'App\Http\Controllers\panel@userswebsite');
Route::get('/packet-website', 'App\Http\Controllers\panel@packetwebsite');
Route::get('/website-keyword', 'App\Http\Controllers\panel@websitekeyword');




