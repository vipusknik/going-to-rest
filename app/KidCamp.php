<?php

namespace App;

use App\Traits\HasSlug;
use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;
use App\Traits\HasMedia;

class KidCamp extends Model
{
    use HasSlug, HasFeatures, HasSocialMedia, HasMedia;

    protected $appends = [ 'class', 'social_media_sites' ];

    protected $casts = [ 'is_paid' => 'boolean' ];
}
