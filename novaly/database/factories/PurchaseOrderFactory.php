<?php

use App\Entities\User;
use Faker\Generator as Faker;

$factory->define(App\Entities\PurchaseOrder::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'shipping_address' => $faker->address,
    ];
});
