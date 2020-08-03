<?php

use App\Models\GroupSchedule;
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
        factory(GroupSchedule::class, 50)->create();
    }
}
