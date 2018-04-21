<?php

namespace App;

class SocialMedia extends Model
{
    public $timestamps = null;

    const SERVICES = [ 'VK', 'Istagram', 'Facebook' ];

    public function social_media()
    {
        return $this->morphTo();
    }
}
