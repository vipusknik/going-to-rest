<?php

namespace App;

use App\Traits\HasSlug;
use App\Traits\HasSocialMedia;

class ActiveRestCompany extends Model
{
    use HasSlug, HasSocialMedia;

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }
}
