<?php

namespace App;

use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    protected $appends = [
        'path',
        'thumbnail_path'
    ];

    public function getPathAttribute()
    {
        return config('app.url') . '/storage' . str_after($this->getUrl(), '/storage');
    }

    public function getThumbnailPathAttribute()
    {
        return config('app.url') . '/storage' . str_after($this->getUrl('thumb'), '/storage');
    }
}
