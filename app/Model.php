<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected $guarded = [];

    public function getClassAttribute()
    {
        return get_class($this);
    }
}
