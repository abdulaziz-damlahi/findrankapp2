<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//api here must be aoi authenticated
Route::group(['middleware'=>['api']],function (){
    Route::put('/viewwebsite', 'App\Http\Controllers\Api\addWebsite@viewwebsite');
    Route::post('/storewebsite', 'App\Http\Controllers\Api\addWebsite@storewebsite');
    Route::delete('deletewebsite/{id}','App\Http\Controllers\Api\addWebsite@deletewebsite');

    Route::put('/viewpacket', 'App\Http\Controllers\Api\addWebsite@viewpacket');
    Route::post('/storepacket', 'App\Http\Controllers\Api\addWebsite@storepacket');
    Route::delete('deletepacket/{id}','App\Http\Controllers\Api\addWebsite@deletepacket');


    Route::get('/users-packet', 'App\Http\Controllers\panel@userspacket');
    Route::get('/users-website', 'App\Http\Controllers\panel@userswebsite');
    Route::get('/packet-website', 'App\Http\Controllers\panel@packetwebsite');
    Route::get('/website-keyword', 'App\Http\Controllers\panel@websitekeyword');
});

