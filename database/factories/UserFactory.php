<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->state(App\User::class, 'student', function ($faker) {
    $type = 'student';
    $class = App\Models\Student::class;

    $typeable = factory($class)->create();

    return [
        'type' => $type,
        'typeable_type' => $class,
        'typeable_id' => $typeable->id,
    ];
});

$factory->state(App\User::class, 'teacher', function ($faker) {
    $type = 'teacher';
    $class = App\Models\Teacher::class;

    $typeable = factory($class)->create();

    return [
        'type' => $type,
        'typeable_type' => $class,
        'typeable_id' => $typeable->id,
    ];
});
