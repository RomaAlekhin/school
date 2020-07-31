<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'age' => $faker->numberBetween(4, 14),
        'parent_name' => $faker->name,
    ];
});
