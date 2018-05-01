<?php

namespace App;

class Activity extends Model
{
    public $timestamps = null;

    public function companies()
    {
        return $this->belongsToMany(ActiveRestCompany::class);
    }
}
