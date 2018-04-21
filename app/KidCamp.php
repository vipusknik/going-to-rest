<?php

namespace App;

use App\Traits\HasSlug;
use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;
use App\Traits\HasMedia;

use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaInterface;

class KidCamp extends Model implements HasMediaInterface
{
    use HasSlug, HasFeatures, HasSocialMedia, HasMedia;

    protected $appends = [ 'class', 'social_media_sites' ];

    protected $casts = [ 'is_paid' => 'boolean' ];
}
