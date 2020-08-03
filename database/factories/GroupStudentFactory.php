<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(GroupStudent::class, function (Faker $faker) {
	return [
		'group_id' => Group::query()->inRandomOrder()->first()->id,
		'student_id' => Student::query()->inRandomOrder()->first()->id,
	];
});
