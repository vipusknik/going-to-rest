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
        $attachableFeatures = [];

        foreach ($features as $id => $description) {
            $attachableFeatures[$id] = [ 'description' => $description ];
        }

        $this->features()->attach($attachableFeatures);

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
        return $this->morphToMany(Feature::class, 'featurable')
            ->withPivot('description');
    }
}
