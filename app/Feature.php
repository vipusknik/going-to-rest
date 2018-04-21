<?php

namespace App;

class Feature extends Model
{
    const OF_REST_CENTER    = 'rest_center';
    const OF_ACCOMODATION   = 'accomodation';
    const OF_MEDICAL_CENTER = 'medical_center';
    const OF_KID_CAMP       = 'kid_camp';

    // Accomodation and rest center categories
    const CATEGORY_FACILITIES   = 'facilities';
    const CATEGORY_LEASURES     = 'leasures';

    // Medical center categories
    const CATEGORY_TREATMENT_TYPES  = 'treatment_types';
    const CATEGORY_PROCEDURES       = 'procedures';

    // Kid camp categories
    const CATEGORY_OCCUPATIONS = 'occupations';

    public $timestamps = null;

    protected $appends = [ 'category_in_russian' ];

    public function getCategoryInRussianAttribute()
    {
        if ($this->category === static::CATEGORY_FACILITIES) {
            return 'Удобства';
        }

        if ($this->category === static::CATEGORY_LEASURES) {
            return 'Досуг';
        }

        if ($this->category === static::CATEGORY_TREATMENT_TYPES) {
            return 'Виды лечения';
        }

        if ($this->category === static::CATEGORY_PROCEDURES) {
            return 'Процедуры';
        }

        if ($this->category === static::CATEGORY_OCCUPATIONS) {
            return 'Досуг, кружки и развлечения';
        }
    }
}
