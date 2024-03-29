<?php

use Illuminate\Support\Facades\Auth;
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

Route::domain('{type}.school.test')->group(function () {
	Route::get('/{any}', 'SpaController@index')->where('any', '.*');
});

Route::domain('school.test')->group(function () {
	Route::get('/{any}', 'SpaController@main')->where('any', '.*');
});
