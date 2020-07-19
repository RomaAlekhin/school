<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GroupSeeder::class,
            GroupScheduleSeeder::class,
            GroupStudentSeeder::class,
            LessonSeeder::class,
        ]);
    }
}
