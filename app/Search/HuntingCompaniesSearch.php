<?php
namespace App\Search;

use App\HuntingCompany;

class HuntingCompaniesSearch
{
    public static function by($request)
    {
        $q = HuntingCompany::query();

        if ($request->filled('query')) {
            $q->nameLike(request('query'));
        }

        if ($request->filled('region')) {
            $q->whereRegionId(request()->region);
        }

        if ($request->filled('type')) {
            $q->whereHas('animals', function ($query) {
                $query->where(request()->type, 1);
            });
        }

        return $q;
    }
}
