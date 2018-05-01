<?php

use Faker\Generator as Faker;

$factory->define(App\KidCamp::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'contacts' => implode(',', [ $faker->phoneNumber, $faker->phoneNumber, $faker->phoneNumber ]),
        'email' => $faker->email,
        'site_link' => $faker->url,
        'location' => $faker->address,
        'distribution_address' => $faker->address,
        'accomodation' => $faker->text,
        'cost' => $faker->sentence,
        'description' => $faker->randomHtml(100, 3)
    ];
});
