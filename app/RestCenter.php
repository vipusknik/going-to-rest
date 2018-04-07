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
            ->filter()
            ->map(function ($item, $key) {
                return [ $key => [ 'option' => $item ] ];
            })
            ->flatten(1);

        $this->features()->attach($features);

        return $this;
    }

    /**
     * Get all of the features for the rest center.
     */
    public function features()
    {
        return $this->morphToMany(Feature::class, 'featurable');
    }
}
