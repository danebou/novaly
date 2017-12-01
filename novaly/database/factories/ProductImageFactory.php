<?php

use Faker\Generator as Faker;

$factory->define(App\ProductImage::class, function (Faker $faker) {
    $url = 'http://lorempixel.com/500/500';
    $content = file_get_contents($url);

    return [
        'product_id' => Product::all()->random()->id,
        'img'
    ];
});
