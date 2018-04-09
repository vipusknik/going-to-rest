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
}
