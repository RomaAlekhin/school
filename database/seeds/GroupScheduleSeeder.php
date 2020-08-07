<?php

use App\Models\GroupSchedule;
use Illuminate\Database\Seeder;

class GroupScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GroupSchedule::class, 50)->create();
    }
}
