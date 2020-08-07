<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Group;
use App\Models\GroupSchedule;
use Faker\Generator as Faker;

$factory->define(GroupSchedule::class, function (Faker $faker) {
    return [
        'group_id' => Group::query()->inRandomOrder()->first()->id,
        'day' => $faker->numberBetween(0, 6),
        'time' => $faker->time('H:i'),
    ];
});
