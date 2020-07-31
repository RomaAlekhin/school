<?php

use App\Models\GroupStudent;
use Illuminate\Database\Seeder;

class GroupStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GroupStudent::class, 150)->create();
    }
}
