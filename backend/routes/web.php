<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getAuthorizationCode', \App\Http\Controllers\GetAuthorizationCode::class);
Route::get('/redirectUri', \App\Http\Controllers\RedirectUri::class);
Route::get('/tokenRequest', \App\Http\Controllers\TokenRequest::class);
