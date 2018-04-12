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
        $this->call(ReservoirsTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        if (App::environment('local')) {
            $this->call(RestCentersTableSeeder::class);
            $this->call(AccomodationsTableSeeder::class);
        }
    }
}
