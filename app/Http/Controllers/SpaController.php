<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function index($type)
    {
        if (method_exists($this, $type)) {
            return $this->$type();
        }

        return abort(404);
    }

    public function student()
    {
        return view('student');
    }

    public function teacher()
    {
        return view('teacher');
    }

    public function admin()
    {
        return view('admin');
    }
}
