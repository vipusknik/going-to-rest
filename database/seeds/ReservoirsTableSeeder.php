<?php

use Illuminate\Database\Seeder;

class ReservoirsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservoirs')->insert([
            [ 'name' => 'Алаколь' ],
            [ 'name' => 'Бухтарма' ],
            [ 'name' => 'Окуньки' ],
            [ 'name' => 'Сибины' ],
            [ 'name' => 'Таинты' ],
            [ 'name' => 'Шульба' ],
            [ 'name' => 'Максал' ],
        ]);
    }
}
