<?php

use App\Entities\Product;
use App\Entities\PurchaseOrder;
use Faker\Generator as Faker;

$factory->define(App\Entities\PurchaseItem::class, function (Faker $faker) {
    return [
        'unit_cost' => $faker->randomFloat(2, 1, 1000),
        'quantity' => $faker->numberBetween(1, 100),
        'product_id' => Product::all()->random()->id,
        'purchase_order_id' => PurchaseOrder::all()->random()->id,
    ];
});
