<?php

namespace App\Traits;

use Cviebrock\EloquentSluggable\Sluggable;

trait HasSlug {

    use Sluggable;

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
        return [ 'slug' => [ 'source' => 'name' ] ];
    }
}
