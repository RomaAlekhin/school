<?php

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
	Route::get('lessons', 'Student\LessonController@index');
	Route::get('lessons/{id}', 'Student\LessonController@show');

	Route::get('me', 'Student\UserController@me');
	Route::get('profile', 'Student\UserController@profile');

	Route::get('user', 'Student\UserController@index');
	Route::get('user/{user_id}', 'Student\UserController@show');
});
