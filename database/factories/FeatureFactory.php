<?php

use Faker\Generator as Faker;

use App\Feature;

$factory->define(\App\Feature::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'belongs_to' => array_random([ Feature::OF_REST_CENTER, Feature::OF_ACCOMODATION ]),
        'category' => 'facilities',
    ];
});
