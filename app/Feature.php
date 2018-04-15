<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    const OF_REST_CENTER = 'rest_center';
    const OF_ACCOMODATION = 'accomodation';
    const CATEGORY_FACILITIES = 'facilities';
    const CATEGORY_LEASURES = 'leasures';

    const OF_MEDICAL_CENTER = 'medical_center';
    const CATEGORY_TREATMENT_TYPES = 'treatment_types';
    const CATEGORY_PROCEDURES = 'procedures';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    public $timestamps = null;

    public static function getCategories($belongsTo)
    {
        if ($belongsTo === static::OF_MEDICAL_CENTER) {
            return [
                static::CATEGORY_TREATMENT_TYPES => 'Виды лечения',
                static::CATEGORY_PROCEDURES => 'Процедуры',
            ];
        }

        if ($belongsTo === static::OF_REST_CENTER) {
            return [
                static::CATEGORY_FACILITIES => 'Удобства',
                static::CATEGORY_LEASURES => 'Досуг',
            ];
        }
    }
}
