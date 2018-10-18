<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'price' => 19000,
        'stock' => 20,
    ];
});
