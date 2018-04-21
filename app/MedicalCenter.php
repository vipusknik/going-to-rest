<?php

namespace App;

use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;
use App\Traits\HasSlug;
use App\Traits\HasMedia;

use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaInterface;

class MedicalCenter extends Model implements HasMediaInterface
{
    use HasSlug, HasFeatures, HasMedia, HasSocialMedia;

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
}
