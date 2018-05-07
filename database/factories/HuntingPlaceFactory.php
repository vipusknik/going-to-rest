<?php

use Faker\Generator as Faker;

$factory->define(App\HuntingPlace::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->state,
        'type' => array_random([ 'place', 'region' ]),
    ];
});
