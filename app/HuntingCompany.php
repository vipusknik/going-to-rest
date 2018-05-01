<?php

namespace App;

use App\Traits\HasSlug;

class HuntingCompany extends Model
{
    use HasSlug;

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'hunting_company_animal');
    }
}
