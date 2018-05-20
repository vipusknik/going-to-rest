<?php

namespace App\Search;
use App\MedicalCenter;

class MedicalCenterSearch
{
    public static function by($request)
    {
        $q = MedicalCenter::query();

        if ($request->filled('query')) {
            $q->nameLike(request('query'));
        }

        if ($request->filled('type')) {
            $q->whereHas('features', function ($query) {
                $query->where('id', 'type');
            });
        }

        return $q;
    }
}
