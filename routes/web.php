<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepage;
use App\Http\Controllers\login;
use App\Http\Controllers\contact;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [homepage::class, 'index']);
Route::get('/login', [login::class, 'index'])->name('login');
Route::get('/contact', [contact::class, 'index'])->name('contact');
Route::get('/settings', [\App\Http\Controllers\settings::class, 'index'])->name('contact');

