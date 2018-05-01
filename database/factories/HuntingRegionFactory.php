<?php

use Faker\Generator as Faker;

$factory->define(App\HuntingRegion::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->country
    ];
});
