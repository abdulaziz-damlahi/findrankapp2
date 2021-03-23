<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use App\Http\Controllers\panel;
use CloudCreativity\LaravelJsonApi\Routing\RouteRegistrar as Api;

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

    $api->resource('Keywords')
            ->middleware("auth");
    $api->post('/findrank', [\App\Http\Controllers\panel::class, 'findPost_T'])->name('findrank');

    $api->resource('Users');
    $api->resource('invoicerecords')->middleware("auth");
    $api->resource('Locations');
    $api->resource('keywordsRequests');
    $api->resource('packets-reels');
    $api->resource('Packets');
    $api->resource('Websites')->middleware("auth");
    Route::prefix('auth')
        ->group(function () use ($api) {
            $api->post('loginByPass', [\App\Http\Controllers\Login::class, 'loginByPass'])->name('loginByPass');
        });
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
