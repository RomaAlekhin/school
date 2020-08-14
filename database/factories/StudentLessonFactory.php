<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use App\Models\Status;
use App\Models\Student;
use App\Models\StudentLesson;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Builder;

$factory->define(StudentLesson::class, function (Faker $faker) {
    return [
        'status_id' => Status::query()->inRandomOrder()->first()->id,

        'mark_behaviour' => $faker->numberBetween(0, 10),
        'mark_activity' => $faker->numberBetween(0, 10),
        'mark_homework' => $faker->numberBetween(0, 10),
        'mark_knowledge' => $faker->numberBetween(0, 10),
    ];
});
