<?php

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes([
	'register' => true,
	'verify' => true,
	'reset' => false
]);

Route::get('check_auth', function () {
	$isAuthenticated = Auth::check();
	$status = $isAuthenticated ? 200 : 401;
	return response('', $status);
});

Route::middleware(['auth:sanctum'])->group(function () {
	Route::get('lesson', 'App\LessonController@index');
	Route::get('lesson/{id}', 'App\LessonController@show');

	Route::get('me', 'App\UserController@me');
	Route::get('user', 'App\UserController@index');
	Route::get('user/{id}', 'App\UserController@show');
});
