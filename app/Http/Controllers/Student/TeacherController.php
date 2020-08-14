<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Auth::user()->typeable;
        $pivotFields = [
            'status_id',
            'mark_behaviour',
            'mark_activity',
            'mark_homework',
            'mark_knowledge',
        ];
        $lessons = $student->historyLessons()->orderBy('date')->take(5)->withPivot($pivotFields)->get();
        return $lessons;
        // return LessonResource::collection($lessons);
    }
}
