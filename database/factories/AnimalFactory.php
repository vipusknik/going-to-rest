<?php

use Faker\Generator as Faker;

$factory->define(App\Animal::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'type' => array_random([ 'animal', 'fish' ]),
        'seasons' => [ 'winter', 'summer', 'spring', 'autumn' ]
    ];
});
