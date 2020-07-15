<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
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

// Route::prefix('sanctum')->namespace('API')->group(function () {
//     Route::post('register', 'AuthController@register');
//     Route::post('login', 'AuthController@login');
// });

// Route::get('/api/sanctum/csrf-cookie', '/sanctum/csrf-cookie');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->namespace('API')->group(function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });

//     Route::get('/name', function (Request $request) {
//         return response()->json(['name' => $request->user()->name]);
//     });

//     // Route::apiResource('/products', 'ProductsController');
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('name', function (Request $request) {
        return response()->json(['name' => $request->user()->name]);
    });

    Route::get('products', 'ProductsController@index');
});

// Auth::routes();
// Broadcast::routes(['middleware' => ['auth:sanctum']]);
// Broadcast::routes(['middleware' => ['auth:sanctum']]);
