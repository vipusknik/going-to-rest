<?php

namespace App\Traits;

use App\SocialMedia;

trait HasSocialMedia
{
    public function socialMedia()
    {
        $socialMedia = [];

        foreach ($this->social_media as $item) {
            $socialMedia[$item->service] = $item->link;
        }

        return (object) $socialMedia;
    }

    public function social_media()
    {
        return $this->morphMany(SocialMedia::class, 'social_media', 'model_type', 'model_id');
    }

    public function attachSocialMedia($socialMedia)
    {
        $socialMedia = array_filter((array) $socialMedia);

        $attachableSocialMedia = [];

        foreach ($socialMedia as $service => $link) {
            $attachableSocialMedia[] = [ 'service' => $service, 'link' => $link ];
        }

        $this->social_media()->createMany($attachableSocialMedia);

        return $this;
    }

    public function getSocialMediaSitesAttribute()
    {
        return $this->socialMedia();
    }

    public function updateSocialMedia($socialMedia)
    {
        $this->social_media()->delete();

        $this->attachSocialMedia($socialMedia);

        return $this;
    }
}
