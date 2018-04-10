<?php

namespace App\Traits;

use App\Feature;

trait HasFeatures
{
    public function features()
    {
        return $this->morphToMany(Feature::class, 'featurable')->withPivot('description');
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
}
