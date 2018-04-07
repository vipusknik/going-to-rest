<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accomodationFacilities = [
            [
                'name' => 'Туалет',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Вода',
                'options' => [ 'гор/хол', 'нет' ],
            ],

            [
                'name' => 'Плита',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Холодильник',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Постельное белье',
                'options' => [ 'есть', 'нет' ],
            ],


            [
                'name' => 'Душ',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Телевизор',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Посуда',
                'options' => [ 'есть', 'нет' ],
            ],
        ];

        foreach ($accomodationFacilities as &$feature) {
            $feature['options'] = json_encode($feature['options']);
            $feature['belongs_to'] = 'accomodation';
            $feature['category'] = 'facilities';
        }

        DB::table('features')->insert($accomodationFacilities);

        $restCenterFacilities = [
            [
                'name' => 'Баня/сауна',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Мангал',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Магазин',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Кафе',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Спорт площадки',
                'options' => [ 'есть', 'нет' ],
            ],


            [
                'name' => 'Прокат снаряжения',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Прокат техники',
                'options' => [ 'есть', 'нет' ],
            ],
        ];

        foreach ($restCenterFacilities as &$feature) {
            $feature['options'] = json_encode($feature['options']);
            $feature['belongs_to'] = 'rest_center';
            $feature['category'] = 'facilities';
        }

        DB::table('features')->insert($restCenterFacilities);

        $restCenterLeasures = [
            [
                'name' => 'Рыбалка',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Охота',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Купание',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Сбор грибов',
                'options' => [ 'есть', 'нет' ],
            ],

            [
                'name' => 'Пешая прогулка',
                'options' => [ 'есть', 'нет' ],
            ],
        ];

        foreach ($restCenterLeasures as &$feature) {
            $feature['options'] = json_encode($feature['options']);
            $feature['belongs_to'] = 'rest_center';
            $feature['category'] = 'leasures';
        }

        DB::table('features')->insert($restCenterLeasures);
    }
}
