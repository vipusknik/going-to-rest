<?php

use Faker\Generator as Faker;

use App\Reservoir;

$factory->define(App\RestCenter::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'contacts' => implode(',', [ $faker->phoneNumber, $faker->phoneNumber, $faker->phoneNumber ]),
        'email' => $faker->email,
        'site_link' => $faker->url,
        'location' => $faker->address,
        'reservoir_id' => factory('App\Reservoir')->create()->id,
        'description' => $faker->randomHtml(100, 3)
    ];
});
