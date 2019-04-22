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

Route::group(['prefix'=>'products','middleware' =>'cors'], function () {
    Route::get('/','ProductController@index');
    Route::get('/{id}','ProductController@show');
    Route::post('/','ProductController@store');
    Route::put('/{product}','ProductController@update')->where('product','[0-9]+');
    Route::delete('/{product}','ProductController@delete')->where('product','[0-9]+');
});

Route::group(['prefix' =>'clients','middleware' =>'cors'], function () {
    Route::get('/','ClientController@index');
    Route::get('/{client}','ClientController@show');
    Route::post('/','ClientController@store');
    Route::put('/{client}','ClientController@update')->where('client','[0-9]+');
    Route::delete('/{client}','ClientController@delete')->where('client','[0-9]+');
});

Route::group(['prefix' =>'credits','middleware' =>'cors'], function () {
    Route::get('/','CreditController@index');
    Route::get('/{credit}','CreditController@show');
    Route::post('/','CreditController@store');
    Route::put('/{credit}','CreditController@update');
    Route::delete('/{credit}','CreditController@delete');
});

Route::group(['prefix' =>'users','middleware' => ['cors']], function () {
    Route::get('/','UserController@index');
    Route::get('/{user}','UserController@show');
    Route::post('/','UserController@store');
    Route::put('/{user}','UserController@update');
    Route::delete('/{user}','UserController@delete');
});

Route::group(['prefix' => 'cash_reports','middleware'=> ['cors']], function () {
    Route::get('/','CashReportController@index');
    Route::get('/{cash_report}','CashReportController@show');
    Route::post('/','CashReportController@store');
});