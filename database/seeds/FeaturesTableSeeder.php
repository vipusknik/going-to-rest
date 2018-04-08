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
            ],

            [
                'name' => 'Вода',
            ],

            [
                'name' => 'Плита',
            ],

            [
                'name' => 'Холодильник',
            ],

            [
                'name' => 'Постельное белье',
            ],


            [
                'name' => 'Душ',
            ],

            [
                'name' => 'Телевизор',
            ],

            [
                'name' => 'Посуда',
            ],
        ];

        foreach ($accomodationFacilities as &$feature) {
            $feature['belongs_to'] = 'accomodation';
            $feature['category'] = 'facilities';
        }

        DB::table('features')->insert($accomodationFacilities);

        $restCenterFacilities = [
            [
                'name' => 'Баня/сауна',
            ],

            [
                'name' => 'Мангал',
            ],

            [
                'name' => 'Магазин',
            ],

            [
                'name' => 'Кафе',
            ],

            [
                'name' => 'Спорт площадки',
            ],


            [
                'name' => 'Прокат снаряжения',
            ],

            [
                'name' => 'Прокат техники',
            ],
        ];

        foreach ($restCenterFacilities as &$feature) {
            $feature['belongs_to'] = 'rest_center';
            $feature['category'] = 'facilities';
        }

        DB::table('features')->insert($restCenterFacilities);

        $restCenterLeasures = [
            [
                'name' => 'Рыбалка',
            ],

            [
                'name' => 'Охота',
            ],

            [
                'name' => 'Купание',
            ],

            [
                'name' => 'Сбор грибов',
            ],

            [
                'name' => 'Пешая прогулка',
            ],
        ];

        foreach ($restCenterLeasures as &$feature) {
            $feature['belongs_to'] = 'rest_center';
            $feature['category'] = 'leasures';
        }

        DB::table('features')->insert($restCenterLeasures);
    }
}
