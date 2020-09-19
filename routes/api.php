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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    
    Route::prefix('ordered')->group(function () {
        Route::get('/{id}', 'OrdersController@get');
        Route::post('/', 'OrdersController@make');
        Route::match(['put', 'patch'], '/{id}', 'OrdersController@make');
        Route::delete('/{id}', 'OrdersController@destroy');
    });

    Route::prefix('product')->group(function () {
        Route::get('/{id}', 'ProductController@get');
        Route::post('/', 'ProductController@make');
        Route::match(['put', 'patch'], '/{id}', 'ProductController@make');
        Route::delete('/{id}', 'ProductController@destroy');
    });
    
});