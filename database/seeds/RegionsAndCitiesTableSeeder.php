<?php

use Illuminate\Database\Seeder;

class RegionsAndCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            [ 'name' => 'Абайский' ],
            [ 'name' => 'Аягозский' ],
            [ 'name' => 'Бескарагайский' ],
            [ 'name' => 'Бородулихинский' ],
            [ 'name' => 'Глубоковский' ],
            [ 'name' => 'Жарминский' ],
            [ 'name' => 'Зайсанский' ],
            [ 'name' => 'Зыряновский' ],
            [ 'name' => 'Катон-Карагайский' ],
            [ 'name' => 'Кокпектинский' ],
            [ 'name' => 'Куршимский' ],
            [ 'name' => 'Тарбагатайский' ],
            [ 'name' => 'Уланский' ],
            [ 'name' => 'Урджарский' ],
            [ 'name' => 'Шемонаихинский' ]
        ]);

        DB::table('cities')->insert([
            [ 'name' => 'Семей' ],
            [ 'name' => 'Усть-Каменогорск' ],
            [ 'name' => 'Риддер' ]
        ]);
    }
}
