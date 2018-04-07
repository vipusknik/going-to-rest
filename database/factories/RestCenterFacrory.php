<?php

use Faker\Generator as Faker;

use App\Reservoir;

$factory->define(App\RestCenter::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence,
        'contacts' => '870703265472, 872368923',
        'location' => $faker->sentence,
        'reservoir_id' => Reservoir::first()->id,
        'description' => $faker->paragraph
    ];
});
