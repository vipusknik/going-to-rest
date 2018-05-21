<?php
namespace App\Search;

use App\ActiveRestCompany;

class ActiveRestCompaniesSearch
{
    public static function by($request)
    {
        $q = ActiveRestCompany::query();

        if ($request->filled('query')) {
            $q->nameLike(request('query'));
        }

        if ($request->filled('activity')) {
            $q->whereHas('activities', function ($query) {
                $query->where('id', request()->activity);
            });
        }

        if ($request->filled('activity')) {
            $q->whereHas('activities', function ($query) {
                $query->where('id', request()->activity);
            });
        }

        if ($request->filled('season')) {
            $q->whereHas('activities', function ($query) {
                $query->where(request()->season, 1);
            });
        }

        return $q;
    }
}
