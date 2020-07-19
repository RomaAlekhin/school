<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_student')->insert([
            'student_id' => 1,
            'group_id' => 1
        ]);

        DB::table('group_student')->insert([
            'student_id' => 1,
            'group_id' => 2
        ]);
    }
}
