<?php

use Faker\Generator as Faker;

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'summer' => array_random([ true, false ]),
        'winter' => array_random([ true, false ]),
        'spring' => array_random([ true, false ]),
        'autumn' => array_random([ true, false ])
    ];
});
