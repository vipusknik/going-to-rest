<?php

namespace App;

use App\Traits\HasSlug;
use App\Traits\HasSocialMedia;

class HuntingCompany extends Model
{
    use HasSlug, HasSocialMedia;

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'hunting_company_animal');
    }
}
