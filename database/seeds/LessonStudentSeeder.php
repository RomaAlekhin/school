<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson_student')->insert([
            'student_id' => 1,
            'lesson_id' => 1
        ]);

        DB::table('lesson_student')->insert([
            'student_id' => 1,
            'lesson_id' => 2
        ]);
    }
}
