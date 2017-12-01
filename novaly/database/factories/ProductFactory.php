<?php

use App\Entities\ProductCategory;
use App\Entities\User;
use Faker\Generator as Faker;

$factory->define(App\Entities\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'list_price' => $faker->randomFloat(2, 1, 1000),
        'discount' => $faker->numberBetween(0, 1) ? $faker->randomFloat(2, 0, 95) : 0,
        'quantity' => $faker->numberBetween(0, 100),
        'description' => $faker->paragraph,
        'user_id' => User::vendors()->get()->random()->id,
        'product_category_id' => ProductCategory::all()->random()->id,
    ];
});
