<?php

namespace App\Search;
use App\KidCamp;

class KidCampsSearch
{
    public static function by($request)
    {
        $q = KidCamp::query();

        if ($request->filled('query')) {
            $q->nameLike(request('query'));
        }

        if ($request->filled('type')) {
            $q->whereHas('features', function ($query) {
                $query->where('id', request()->type);
            });
        }

        if ($request->filled('city')) {
            $q->whereCityId(request()->city);
        }

        return $q;
    }
}
