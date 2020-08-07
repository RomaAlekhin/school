<?php

use App\Models\Student;
use App\Models\StudentLesson;
use Illuminate\Database\Seeder;

class StudentLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::has('groups.lessons')->get();
        foreach ($students as $student) {
            $groups = $student->groups()->has('lessons')->get();

            foreach ($groups as $group) {
                $lessons = $group->lessons()->get();

                foreach ($lessons as $lesson) {
                    factory(StudentLesson::class, 1)->create([
                        'student_id' => $student->id,
                        'lesson_id' => $lesson->id,
                    ]);
                }
            }
        }
    }
}
