<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 7; $i++) {
            DB::table('group_schedules')->insert([
                'day' => $i,
                'time' => '14:00',
                'group_id' => 1
            ]);
        }

        for ($i = 0; $i < 7; $i++) {
            DB::table('group_schedules')->insert([
                'day' => $i,
                'time' => '17:00',
                'group_id' => 2
            ]);
        }
    }
}
