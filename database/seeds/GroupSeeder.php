<?php

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{

    protected $studentRelations = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Group::class, 50)
            ->create()
            ->each(function (Group $group) {

                // get list of random students
                $students = Student::inRandomOrder()->limit(random_int(1, 5))->get();
                $studentIds = $students->pluck('id');

                // attach list of IDs to group
                $group->students()->syncWithoutDetaching($studentIds);
            });
    }
}
