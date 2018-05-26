<?php

namespace App\Http\Controllers;

use App\RestCenter;
use App\Reservoir;
use Illuminate\Http\Request;
use App\Search\RestCentersSearch;

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
            $models = RestCentersSearch::by($request)
                ->with([ 'reservoir', 'social_media', 'features', 'media', 'accomodations', 'accomodations.features' ])
                ->get();

            return compact('models');
        }

        $reservoirs = Reservoir::orderBy('name')->get();

        return view('rest-centers.index', compact('reservoirs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function show(RestCenter $restCenter)
    {
        $restCenter->load([ 'reservoir', 'social_media', 'features', 'media', 'accomodations', 'accomodations.features' ]);

        $reservoirs = Reservoir::orderBy('name')->get();

        return view('rest-centers.show', [
            'model' => $restCenter,
            'reservoirs' => $reservoirs
        ]);
    }
}
