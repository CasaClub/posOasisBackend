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
<<<<<<< HEAD
|
=======
| 
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
