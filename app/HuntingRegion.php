<?php

namespace App;

class HuntingRegion extends Model
{
    public $timestamps = null;

    public function companies()
    {
        return $this->hasMany(HuntingCompany::class);
    }
}
