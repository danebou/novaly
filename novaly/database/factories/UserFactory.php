<?php

use Faker\Generator as Faker;

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

$factory->define(App\Entities\User::class, function (Faker $faker) {
    static $password;

    return [
        'family_name' => $faker->firstName,
        'given_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'user_type_id' => $faker->numberBetween(1, 3),
        'remember_token' => str_random(10),
    ];
});
