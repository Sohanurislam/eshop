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


Route::middleware('auth:api')->get('/products','Api\ProductController@index');

//Route::get('/test-api', function () {
//    return response()->json([
//        'name'=>'Sohan',
//        'email'=>'Sohan@gmail.com',
//    ]);
//});


//Route::get('/test-api', function () {
//
//    $user = [
//        'name'=>'Sohan',
//        'email'=>'Sohan@gmail.com',
//    ];
//    return response()->json($user);

