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
    return view('home');
});
Route::get('/token', 'VideoController@token');
Route::get('/room2/{room_name}', 'VideoController@index');
Route::get('/room/getAccessToken/{room_name}', 'VideoController@getAccessToken');
Route::get('/room/complete/{room_id}', 'VideoController@complete');

