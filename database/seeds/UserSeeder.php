<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->states('student')->create();
        factory(User::class, 15)->states('teacher')->create();

        factory(User::class, 1)->states('student', 'student_test')->create();
        factory(User::class, 1)->states('teacher', 'teacher_test')->create();
    }
}
