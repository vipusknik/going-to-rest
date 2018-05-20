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
                $query->where('id', request()->type);
            });
        }

        if ($request->filled('region')) {
            if (starts_with(request()->region, 'city_')) {
                $q->whereCityId(str_after(request()->region, 'city_'));
            } else {
                $q->whereRegionId(request()->region);
            }
        }

        return $q;
    }
}
