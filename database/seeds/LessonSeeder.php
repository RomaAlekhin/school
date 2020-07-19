<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            DB::table('lessons')->insert([
                'group_id' => 1,
                'date' => "2020-05-0$i",
                'homework' => 'lesson homework 1' . $i
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            DB::table('lessons')->insert([
                'group_id' => 2,
                'date' => "2020-05-1$i",
                'homework' => 'lesson homework 2' . $i
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            DB::table('lessons')->insert([
                'group_id' => 3,
                'date' => "2020-05-2$i",
                'homework' => 'lesson homework 3' . $i
            ]);
        }
    }
}
