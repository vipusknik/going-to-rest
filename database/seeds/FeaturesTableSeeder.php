<?php

use Illuminate\Database\Seeder;
use App\Feature;

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
            [ 'name' => 'Туалет' ],
            [ 'name' => 'Вода' ],
            [ 'name' => 'Плита' ],
            [ 'name' => 'Холодильник' ],
            [ 'name' => 'Постельное белье' ],
            [ 'name' => 'Душ' ],
            [ 'name' => 'Телевизор' ],
            [ 'name' => 'Посуда' ],
        ];

        foreach ($accomodationFacilities as &$feature) {
            $feature['belongs_to'] = Feature::OF_ACCOMODATION;
            $feature['category'] = Feature::CATEGORY_FACILITIES;
        }

        DB::table('features')->insert($accomodationFacilities);

        $restCenterFacilities = [
            [ 'name' => 'Баня/сауна' ],
            [ 'name' => 'Мангал' ],
            [ 'name' => 'Магазин' ],
            [ 'name' => 'Кафе' ],
            [ 'name' => 'Спорт площадки' ],
            [ 'name' => 'Прокат снаряжения' ],
            [ 'name' => 'Прокат техники' ],
        ];

        foreach ($restCenterFacilities as &$feature) {
            $feature['belongs_to'] = Feature::OF_REST_CENTER;
            $feature['category'] = Feature::CATEGORY_FACILITIES;
        }

        DB::table('features')->insert($restCenterFacilities);

        $restCenterLeasures = [
            [ 'name' => 'Рыбалка' ],
            [ 'name' => 'Охота' ],
            [ 'name' => 'Купание' ],
            [ 'name' => 'Сбор грибов' ],
            [ 'name' => 'Пешая прогулка' ],
        ];

        foreach ($restCenterLeasures as &$feature) {
            $feature['belongs_to'] = Feature::OF_REST_CENTER;
            $feature['category'] = Feature::CATEGORY_LEASURES;
        }

        DB::table('features')->insert($restCenterLeasures);

        $medicalCenterTreatmentTypes = [
            [  'name' => 'Пантолечение' ],
            [  'name' => 'Грязевые ванны' ],
        ];

        foreach ($medicalCenterTreatmentTypes as &$feature) {
            $feature['belongs_to'] = Feature::OF_MEDICAL_CENTER;
            $feature['category'] = Feature::CATEGORY_TREATMENT_TYPES;
        }

        DB::table('features')->insert($medicalCenterTreatmentTypes);

        $medicalCenterProcedures = [
            [  'name' => 'Массаж' ],
        ];

        foreach ($medicalCenterProcedures as &$feature) {
            $feature['belongs_to'] = Feature::OF_MEDICAL_CENTER;
            $feature['category'] = Feature::CATEGORY_PROCEDURES;
        }

        DB::table('features')->insert($medicalCenterProcedures);
    }
}
