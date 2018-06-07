<?php

use Faker\Generator as Faker;

$factory->define(App\Products_bid::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'ip' => $faker->ipv4,
        'bid' => $faker->numberBetween($min = 100, $max = 200),	
    ];
});
