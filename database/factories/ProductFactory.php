<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
        'sku' => $faker->unique()->ean8,
        'price' => $faker->numberBetween($min = 100, $max = 200),	
        'description' => $faker->realText(180),
    ];
});
