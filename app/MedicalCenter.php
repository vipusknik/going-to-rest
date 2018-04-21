<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;
use App\Traits\HasSlug;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class MedicalCenter extends Model implements HasMedia
{
    use HasSlug, HasFeatures, HasMediaTrait, HasSocialMedia;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    protected $appends = [ 'class', 'social_media_sites' ];

    protected $casts = [ 'is_paid' => 'boolean' ];

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('images');
        $this->addMediaCollection('main-image')->singleFile();
    }
}
