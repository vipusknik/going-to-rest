<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RestCenter extends Model
{
    use Sluggable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getContactsAttribute($contacts)
    {
        return explode(',', $contacts);
    }

    public function setContactsAttribute($contacts)
    {
        return implode(',', (array) $contacts);
    }

    public function attachFeatures($features)
    {
        $attachableFeatures = [];

        foreach ($features as $id => $description) {
            $attachableFeatures[$id] = [ 'description' => $description ];
        }

        $this->features()->attach($attachableFeatures);

        return $this;
    }

    public function accomodations()
    {
        return $this->hasMany(Accomodation::class);
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
