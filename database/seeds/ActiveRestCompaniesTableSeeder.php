<?php

use Illuminate\Database\Seeder;

class ActiveRestCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ActiveRestCompany', 30)->create();
    }
}
