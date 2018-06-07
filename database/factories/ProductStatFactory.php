<?php

use Faker\Generator as Faker;

$factory->define(App\Products_stat::class, function (Faker $faker) {
    return [
        'avaragebid' => $faker->numberBetween($min = 100, $max = 200),
        'lowestbid' => $faker->numberBetween($min = 100, $max = 200),
        'highestbid' => $faker->numberBetween($min = 100, $max = 200),	
        'views' => $faker->numberBetween($min = 100, $max = 200),
    ];
});