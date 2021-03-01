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

    JsonApi::register('default', [], function ( $api) {


        $api->resource('Keywords');
    $api->resource('Packets');
    $api->resource('Websites');
});JsonApi::register('v1')->routes(function ($api) {

    $api->resource('Keywords');
    $api->resource('Packets');
    $api->resource('Websites');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
