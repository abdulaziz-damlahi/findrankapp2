<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    JsonApi::register('default', [], function (Api $api) {
        $api->resource('Keywords');
    $api->resource('Packets', [
        'hasMany' => 'websites']);
    $api->resource('Websites');
        $api->resource('Users');

    });
    JsonApi::register('v1')->routes(function (Api $api) {
        $api->post("Packets");
    $api->resource('Keywords');
    $api->resource('Users');
    $api->resource('Packets');
    $api->resource('Websites');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
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

