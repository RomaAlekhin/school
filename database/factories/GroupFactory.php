<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Group;
use App\Models\Teacher;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'teacher_id' => Teacher::query()->inRandomOrder()->first()->id,
        'name' => $faker->company,
    ];
});
