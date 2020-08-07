<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Auth::user()->typeable->groups;
        if (!$groups) return [];

        // $allLessons = [];
        // foreach ($groups as $group) {
        //     $lessons = $group->lessons;
        //     if (!$lessons) continue;

        //     foreach ($lessons as $lesson) {
        //         $allLessons[] = [
        //             'id' => $lesson->id,
        //             'date' => $lesson->date,
        //         ];
        //     }
        // }

        return Auth::user()->typeable->historyLessons;
        // $allLessons = collect();
        // if (!empty($groups)) {
        //     foreach ($groups as $group) {
        //         $allLessons = $allLessons->merge($group->historyLessons);
        //     }
        // };

        // return $allLessons;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
