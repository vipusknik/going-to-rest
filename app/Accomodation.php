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

    protected $appends = [ 'type_in_russian' ];

    /**
     * Turn off timestamps
     * @var null
     */
    public $timestamps = null;

    /**
     * Accomodation types
     */
    const TYPE_ROOM = 'room';
    const TYPE_HOUSE = 'house';

    public static function types()
    {
        return [ static::TYPE_ROOM, static::TYPE_HOUSE ];
    }

    public function getTypeInRussianAttribute()
    {
        if ($this->type === static::TYPE_ROOM) {
            return 'Номер';
        }

        if ($this->type === static::TYPE_HOUSE) {
            return 'Домик';
        }
    }

    public function restCenter()
    {
        return $this->belongsTo(RestCenter::class);
    }
}
