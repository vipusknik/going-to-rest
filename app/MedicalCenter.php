<?php

namespace App;

use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;
use App\Traits\HasSlug;
use App\Traits\HasMedia;

use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaInterface;

class MedicalCenter extends Model implements HasMediaInterface
{
    use HasSlug, HasFeatures;
    use HasMedia, HasSocialMedia;

    protected $appends = [
        'class',
        'social_media_sites'
    ];

    protected $casts = [
        'is_paid' => 'boolean'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public static function relations()
    {
        return [ 'social_media', 'features', 'media' ];
    }
}
