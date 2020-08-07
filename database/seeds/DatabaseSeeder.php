<?php

use App\Jobs\CreateLessons;
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
            StatusSeeder::class,
        ]);

        CreateLessons::dispatch();

        $this->call([
            // UserSeeder::class,
            // GroupSeeder::class,
            // GroupScheduleSeeder::class,
            // StatusSeeder::class,
            StudentLessonSeeder::class,
        ]);
    }
}
