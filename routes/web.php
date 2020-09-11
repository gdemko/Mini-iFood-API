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

Route::prefix('ordered')->group(function () {
    Route::get('/', 'OrdersController@get');
    Route::post('/', 'OrdersController@make');
    Route::match(['put', 'patch'], '/{id}', 'OrdersController@make');
    Route::delete('/{id}', 'OrdersController@delete');
});