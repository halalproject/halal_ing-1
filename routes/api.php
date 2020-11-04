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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/company',function(){
    return view('api/company');
});

Route::get('/ingredient',function(){
    return view('api/ingredient');
});

Route::get('/test_company','Api\TestController@company');
Route::get('/test_ramuan','Api\TestController@ramuan');