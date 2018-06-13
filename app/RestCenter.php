<?php

namespace App;

use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;
use App\Traits\HasSlug;
use App\Traits\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaInterface;
use Spatie\MediaLibrary\Models\Media;

class RestCenter extends Model implements HasMediaInterface
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

    public function scopeNameLike($query, $string)
    {
        return $query->where('name', 'like', "%$string%");
    }

    public function accomodations()
    {
        return $this->hasMany(Accomodation::class);
    }

    public static function relations()
    {
        return [ 'reservoir', 'social_media', 'features', 'media', 'accomodations', 'accomodations.features' ];
    }

    public function reservoir()
    {
        return $this->belongsTo(Reservoir::class);
    }
}
