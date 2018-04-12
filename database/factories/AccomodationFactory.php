<?php

use Faker\Generator as Faker;

use App\Accomodation;

$factory->define(Accomodation::class, function (Faker $faker) {
    return [
        'rest_center_id' => factory('App\RestCenter')->create()->id,
        'guest_count' => array_random([ 1, 2, 3, 4, 5, 6 ]),
        'price_per_day' => array_random([ 2200, 5700, 6300, 0 ]),
        'type' => array_random(Accomodation::types()),
        'description' => $faker->text
    ];
});
