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
        DB::table('lessons')->insert([
            'group_id' => 1,
            'date' => '2020-05-05'
        ]);
        DB::table('lessons')->insert([
            'group_id' => 2,
            'date' => '2020-05-06'
        ]);
    }
}
