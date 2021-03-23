<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user/')->middleware('auth')->group(function(){
    Route::get('/panel', 'App\Http\Controllers\panel@index')->name('panel');
    Route::get('/findorder', 'App\Http\Controllers\panel@FindOrder')->name('findorder');
    Route::post('/findorders', 'App\Http\Controllers\panel@findPost')->name('findpost');
    Route::get('/settings', 'App\Http\Controllers\settings@index')->name('settings');
    Route::post('/settings/password', 'App\Http\Controllers\settings@store_personal_settings')->name('set.post');
    Route::post('/settings/personal_settings', 'App\Http\Controllers\settings@store_password')->name('personal.settings');
    Route::post('/settings/custumize', 'App\Http\Controllers\settings@store_custumize')->name('custumize');
    Route::get('/profile', 'App\Http\Controllers\panel@profile')->name('profile');
    Route::get('/logout','App\Http\Controllers\Login@logout')->name('logout');
    Route::post('/addwebsite', 'App\Http\Controllers\panel@addwebsite')->name('addwebsite');
    Route::get('/packets', 'App\Http\Controllers\packets@index')->name('packets');
    Route::post('/packets', 'App\Http\Controllers\payment@pay_post')->name('packets_post');
    Route::get('/deletewebsite/{id}', 'App\Http\Controllers\panel@deletewebsite')->name('deletewebsite');
    Route::get('/website/{websiteid}', 'App\Http\Controllers\panel@websitelist')->name('websitelist');
    Route::get('/website/deletekeyword/{id}', 'App\Http\Controllers\panel@deletekeyword')->name('deletekeyword');
    Route::post('/addword', 'App\Http\Controllers\panel@addword')->name('addword');

});
Route::prefix('user/')->middleware('isLogin')->group(function() {
    Route::get('/login', 'App\Http\Controllers\Login@index')->name('login');
    Route::post('/login', 'App\Http\Controllers\Login@Loginpost')->name('login.post');
    Route::post('/register', 'App\Http\Controllers\Login@registerPost')->name('register.post');

});

Route::get('/', 'App\Http\Controllers\homepage@index')->name('home');
Route::get('/contact', 'App\Http\Controllers\contact@index')->name('contact');
Route::post('/contact', 'App\Http\Controllers\contact@post')->name('contact.post');
Route::get('/users-packet', 'App\Http\Controllers\panel@userspacket');
Route::get('/users-website', 'App\Http\Controllers\panel@userswebsite');
Route::get('/packet-website', 'App\Http\Controllers\panel@packetwebsite');
Route::get('/website-keyword', 'App\Http\Controllers\panel@websitekeyword');




