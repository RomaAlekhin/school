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

// Route::domain('student.*')->group(function () {
// 	Route::get('/{any}', 'SpaController@student')->where('any', '.*');
// });

// Route::domain('student.school.test')->group(function () {
// 	Route::get('/{any}', 'SpaController@student')->where('any', '.*');
// });

// Route::domain('teacher.school.test')->group(function () {
// 	Route::get('/{any}', 'SpaController@teacher')->where('any', '.*');
// });

// Route::domain('admin.school.test')->group(function () {
// 	Route::get('/{any}', 'SpaController@admin')->where('any', '.*');
// });

Route::domain('{type}.school.test')->group(function () {
	// return response("123", 200);
	Route::get('/{any}', 'SpaController@index')->where('any', '.*');
});

// Route::group(['prefix' => 'teacher'], function () {
// 	Auth::routes([
// 		'register' => true,
// 		'verify' => true,
// 		'reset' => false
// 	]);
// });

// Route::group(['prefix' => 'admin'], function () {
// 	Auth::routes([
// 		'register' => false,
// 		'verify' => true,
// 		'reset' => false
// 	]);

// 	Route::get('user', 'UserController@index');
// 	Route::get('user/{id}', 'UserController@show');
// });

// Route::get('/', 'HomeController@index');
// Route::get('/home', 'HomeController@index');
