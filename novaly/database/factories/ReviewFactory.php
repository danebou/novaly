<?php

use App\Entities\Product;
use App\Entities\User;
use Faker\Generator as Faker;

$factory->define(App\Entities\Review::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'rating' => $faker->numberBetween(1, 5),
        'title' => $faker->sentence(),
        'text' => $faker->paragraph(),
    ];
});
