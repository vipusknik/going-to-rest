<?php

namespace App;

class Animal extends Model
{
    public $timestamps = null;

    protected $casts = [
        'seasons' => 'array'
    ];

    public function companies()
    {
        return $this->belongsToMany(HuntingCompany::class, 'hunting_company_animal');
    }
}
