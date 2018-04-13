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
        return $this->getUrl();
    }

    public function getThumbnailPathAttribute()
    {
        return $this->getUrl('thumb');
    }
}
