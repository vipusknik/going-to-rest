<?php

use Illuminate\Database\Seeder;

class RestCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\RestCenter', 100)->create();
    }
}
