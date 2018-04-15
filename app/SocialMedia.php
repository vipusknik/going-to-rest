<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    public $timestamps = null;

    const SERVICES = [ 'VK', 'Istagram', 'Facebook' ];

    public function social_media()
    {
        return $this->morphTo();
    }
}
