<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\HasSlug;
use App\Traits\HasFeatures;
use App\Traits\HasSocialMedia;

class KidCamp extends Model
{
    use HasSlug, HasFeatures, HasSocialMedia;

    protected $guarded = [];
}
