<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    const OF_REST_CENTER = 'rest_center';
    const OF_ACCOMODATION = 'accomodation';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    public $timestamps = null;

    protected $appends = [ 'category_in_russian' ];

    const CATEGORY_FACILITIES = 'facilities';
    const CATEGORY_LEISURES = 'leasures';

    public function getCategoryInRussianAttribute()
    {
        if ($this->category === static::CATEGORY_FACILITIES) {
            return 'Удобства';
        }

        if ($this->category === static::CATEGORY_LEISURES) {
            return 'Досуг';
        }
    }
}
