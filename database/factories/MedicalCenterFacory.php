<?php

use Faker\Generator as Faker;

$factory->define(App\MedicalCenter::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'contacts' => implode(',', [ $faker->phoneNumber, $faker->phoneNumber, $faker->phoneNumber ]),
        'email' => $faker->email,
        'site_link' => $faker->url,
        'location' => $faker->address,
        'distribution_address' => $faker->address,
        'description' => $faker->randomHtml(100, 3)
    ];
});
