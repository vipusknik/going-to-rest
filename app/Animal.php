<?php

namespace App;

class Animal extends Model
{
    public $timestamps = null;

    protected $casts = [
        'seasons' => 'array'
    ];
}
