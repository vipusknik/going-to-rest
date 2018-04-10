<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFeatures;

class Accomodation extends Model
{
    use HasFeatures;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    public $timestamps = null;

    const TYPE_ROOM = 'room';
    const TYPE_HOUSE = 'house';

    public static function types()
    {
        return [ static::TYPE_ROOM, static::TYPE_HOUSE ];
    }

    /**
     * Get all of the features for the rest center.
     */
    public function features()
    {
        return $this->morphToMany(Feature::class, 'featurable')->withPivot('description');
    }
}
