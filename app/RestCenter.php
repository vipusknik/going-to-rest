<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class RestCenter extends Model implements HasMedia
{
    use Sluggable, HasFeatures, HasMediaTrait, HasSocialMedia;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    protected $appends = [ 'class', 'social_media_sites' ];

    protected $casts = [ 'is_paid' => 'boolean' ];

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
        $this->attributes['contacts'] = implode(',', (array) $contacts);
    }

    public function getClassAttribute()
    {
        return get_class($this);
    }

    public function accomodations()
    {
        return $this->hasMany(Accomodation::class);
    }

    public function reservoir()
    {
        return $this->belongsTo(Reservoir::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }
}
