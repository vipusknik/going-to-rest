<?php

namespace App\Http\Controllers;

use App\RestCenter;
use App\Reservoir;
use Illuminate\Http\Request;

class RestCentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $q = RestCenter::query();

            if ($request->filled('query')) {
                $q->nameLike(request('query'));
            }

            if ($request->filled('reservoir')) {
                $q->whereReservoirId($request->reservoir);
            }

            if ($request->filled('guest_count')) {
                $q->whereHas('accomodations', function ($query) {
                    return $query->where('guest_count', '>=', request('guest_count'));
                });
            }

            if ($request->filled('price_from')) {
                $q->whereHas('accomodations', function ($query) {
                    return $query->where('price_per_day', '>=', request('price_from'));
                });
            }

            if ($request->filled('price_to')) {
                $q->whereHas('accomodations', function ($query) {
                    return $query->where('price_per_day', '<=', request('price_to'));
                });
            }

            if ($request->filled('accomodation_type')) {
                $q->whereHas('accomodations', function ($query) {
                    return $query->where('type', request('accomodation_type'));
                });
            }

            if ($request->filled('has_food') && $request->has_food === true) {
                $q->whereHas('accomodations', function ($query) {
                    return $query->whereHas('features', function ($queryFeatrues) {
                        return $queryFeatrues->where('id', 28);
                    });
                });
            }

            $models = $q->with([ 'reservoir', 'media', 'accomodations.features', 'features' ])->get();

            return compact('models');
        }

        $reservoirs = Reservoir::orderBy('name')->get();

        return view('rest-centers', compact('reservoirs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function show(RestCenter $restCenter)
    {
        //
    }
}
