<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\Student\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return $request->user();
    }

    public function profile(Request $request)
    {

        $user = $request->user()->typeable()->with('groups')->get();
        // $user->setAttribute('lessons', $user->getLessonsAttribute());

        // $user::withoutWrapping();
        return $user;
        // UserResource::withoutWrapping();
        // return new UserResource($request->user());
    }

    public function index()
    {
        return User::all();
    }

    public function show(Request $request, User $user)
    {
        return $user;
    }
}
