<?php

namespace App\Traits;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

trait HasMedia
{
    use HasMediaTrait;

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

    public function media()
    {
        return $this->morphMany(config('medialibrary.media_model'), 'model')->orderByDesc('collection_name');
    }
}
