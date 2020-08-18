<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'birth_date' => $faker->date,
        'phone' => $faker->tollFreePhoneNumber,
        'parent_name' => $faker->name,
        'parent_phone' => $faker->tollFreePhoneNumber,
        'parent_email' => $faker->email,
    ];
});
