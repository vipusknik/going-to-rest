<?php

use Faker\Generator as Faker;

$factory->define(\App\Feature::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'belongs_to' => array_random([ 'rest_center', 'accomodation' ]),
        'category' => 'facilities',
    ];
});
