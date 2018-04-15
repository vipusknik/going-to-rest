<?php

use Illuminate\Database\Seeder;

class MedicalCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MedicalCenter::class, 20)->create();
    }
}
