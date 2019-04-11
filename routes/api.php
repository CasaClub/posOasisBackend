<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' =>'api'], function () {
    Route::get('/products','ProductController@index');
    Route::get('/products/{id}','ProductController@show');
    Route::post('/products','ProductController@store');
    Route::put('/products/{product}','ProductController@update')->where('product','[0-9]+');
    Route::delete('/products/{product}','ProductController@delete')->where('product','[0-9]+');
});