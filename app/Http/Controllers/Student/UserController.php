<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\Student\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return $request->user();
    }

    public function profile(Request $request)
    {

        $user = $request->user()->typeable()->with('groups')->get();
        return $user;
    }
}
