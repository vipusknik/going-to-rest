<?php

namespace App;

use App\Traits\HasSlug;
use App\Traits\HasSocialMedia;
use App\Traits\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaInterface;

class ActiveRestCompany extends Model implements HasMediaInterface
{
    use HasSlug, HasSocialMedia, HasMedia;

    protected $appends = [
        'class',
        'social_media_sites'
    ];

    protected $casts = [
        'is_paid' => 'boolean',
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class)->withPivot('cost');
    }
}
