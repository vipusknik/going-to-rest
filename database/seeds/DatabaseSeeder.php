<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionsAndCitiesTableSeeder::class);

        if (App::environment('local')) {
            $this->call(ReservoirsTableSeeder::class);
            $this->call(FeaturesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(RestCentersTableSeeder::class);
            $this->call(AccomodationsTableSeeder::class);
            $this->call(MedicalCentersTableSeeder::class);
            $this->call(KidCampsTableSeeder::class);
            $this->call(ActiveRestCompaniesTableSeeder::class);

            factory('App\Activity', 30)->create();
        }
    }
}
