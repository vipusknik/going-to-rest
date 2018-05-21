<?php

use Faker\Generator as Faker;
use App\HuntingCompany;

$factory->define(HuntingCompany::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'contacts' => implode(',', [ $faker->phoneNumber, $faker->phoneNumber, $faker->phoneNumber ]),
        'email' => $faker->email,
        'site_link' => $faker->url,
        'place' => $faker->sentence,
        'region_id' => \App\Region::create([ 'name' => $faker->word ])->id,
        'hunting' => array_random([ true, false ]),
        'fishing' => array_random([ true, false ]),
        'distribution_address' => $faker->address,
        'description' => $faker->randomHtml(100, 3)
    ];
});
