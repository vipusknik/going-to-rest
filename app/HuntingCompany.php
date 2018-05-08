<?php

namespace App;

use App\Traits\HasSlug;
use App\Traits\HasSocialMedia;
use App\Traits\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaInterface;

class HuntingCompany extends Model implements HasMediaInterface
{
    use HasSlug, HasSocialMedia;
    use HasMedia;

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'hunting_company_animal');
    }
}
