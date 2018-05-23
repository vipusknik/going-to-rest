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

        // if ($request->filled('animal')) {
        //     $q->whereHas('animal', function ($query) {
        //         $query->where('id', request()->animal);
        //     });
        // }

        // if ($request->filled('activity')) {
        //     $q->whereHas('activities', function ($query) {
        //         $query->where('id', request()->activity);
        //     });
        // }

        // if ($request->filled('season')) {
        //     $q->whereHas('activities', function ($query) {
        //         $query->where(request()->season, 1);
        //     });
        // }

        return $q;
    }
}
