<?php

namespace App\Search;
use App\RestCenter;

class RestCentersSearch
{
    // public function ()
    // {
    //     $params = $request->query();

    //     foreach ($params as $name => $value) {
    //         if ($request->filled($name) &&
    //             method_exists(static::class, $method = camel_case($name))
    //         ) {
    //             $this->{$method};
    //         }
    //     }
    // }

    public static function by($request)
    {
        $q = RestCenter::query();

        if ($request->filled('query')) {
            $q->nameLike(request('query'));
        }

        if ($request->filled('reservoir')) {
            $q->whereReservoirId($request->reservoir);
        }

        if ($request->filled('guest_count')) {
            $q->whereHas('accomodations', function ($query) {
                $query->where('guest_count', '>=', request('guest_count'));
            });
        }

        if ($request->filled('price_from')) {
            $q->whereHas('accomodations', function ($query) {
                $query->where('price_per_day', '>=', request('price_from'));
            });
        }

        if ($request->filled('price_to')) {
            $q->whereHas('accomodations', function ($query) {
                $query->where('price_per_day', '<=', request('price_to'));
            });
        }

        if ($request->filled('accomodation_type')) {
            $q->whereHas('accomodations', function ($query) {
                $query->where('type', request('accomodation_type'));
            });
        }

        if ($request->filled('has_food') && $request->has_food == true) {
            $q->whereHas('accomodations.features', function ($query) {
                $query->where('id', 28);
            });
        }

        if ($request->filled('sort_by')) {
            if ($request->sort_by === 'a-z') {
                $q->orderBy('name', 'asc');
            }

            if ($request->sort_by === 'z-a') {
                $q->orderBy('name', 'desc');
            }

            // if ($request->sort_by === 'price_asc') {
            //     $q->with('accomodations')->orderBy('accomodations.price_per_day', 'desc');
            // }

            // if ($request->sort_by === 'price_desc') {
            //     $q->orderByJoin('accomodations.price_per_day');
            // }
        }

        return $q;
    }
}
