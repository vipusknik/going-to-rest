<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    const OF_REST_CENTER = 'rest_center';
    const OF_ACCOMODATION = 'accomodation';
    const OF_MEDICAL_CENTER = 'medical_center';

    const CATEGORY_FACILITIES = 'facilities';
    const CATEGORY_LEISURES = 'leasures';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    public $timestamps = null;
}
