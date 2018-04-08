<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestCenter extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    public function attachFeatures($features)
    {
        $features = collect($features)
            ->map(function ($item, $key) {
                return [ $key => [ 'description' => $item ] ];
            })
            ->flatten(1);

        $this->features()->attach($features);

        return $this;
    }

    public function reservoir()
    {
        return $this->belongsTo(Reservoir::class);
    }

    /**
     * Get all of the features for the rest center.
     */
    public function features()
    {
        return $this->morphToMany(Feature::class, 'featurable');
    }
}
