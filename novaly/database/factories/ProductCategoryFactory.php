<?php

use App\Entities\ProductCategory;
use Faker\Generator as Faker;

$factory->define(App\Entities\ProductCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'parent_category_id' => $faker->numberBetween(0, ProductCategory::all()->random()->id) ?: null,
    ];
});
