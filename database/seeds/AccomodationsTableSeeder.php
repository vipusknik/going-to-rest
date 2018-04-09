<?php

use Illuminate\Database\Seeder;

class AccomodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Accomodation', 10)->create();
    }
}
