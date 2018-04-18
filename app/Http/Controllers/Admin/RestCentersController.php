<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestCentersRequest;

use App\RestCenter;
use App\Reservoir;
use App\Feature;

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
            $query = $request->input('query');

            $restCenters = RestCenter::where('name', 'like', "%$query%")
                ->with([ 'reservoir', 'accomodations' ])
                ->get();

            return compact('restCenters');
        }

        $restCenters = RestCenter::with([ 'reservoir', 'accomodations' ])->latest()->get();
        $reservoirs = Reservoir::all();

        return view('admin.rest-centers.index', compact('restCenters', 'reservoirs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::all();

        $features = Feature::where('belongs_to', Feature::OF_REST_CENTER)->get()->groupBy('category');

        return view('admin.rest-centers.create', compact('reservoirs', 'features', 'featureCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RestCentersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestCentersRequest $request)
    {
        $restCenter = RestCenter::create($request->except([ 'features', 'social_media' ]))
            ->attachFeatures($request->features)
            ->attachSocialMedia($request->social_media);

        return redirect()->route('admin.rest-centers.index')
            ->withFlash('База отдыха сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function show(RestCenter $restCenter)
    {
        $restCenter->load('reservoir', 'features', 'accomodations.features', 'media', 'social_media');

        return compact('restCenter');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(RestCenter $restCenter)
    {
        $restCenter->load('reservoir', 'features');

        $reservoirs = Reservoir::all();

        $features = Feature::where('belongs_to', Feature::OF_REST_CENTER)->get()->groupBy('category');

        return view('admin.rest-centers.edit', compact('restCenter', 'reservoirs', 'features', 'featureCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function update(RestCenter $restCenter, RestCentersRequest $request)
    {
        $restCenter->update($request->except([ 'features', 'social_media' ]));

        $restCenter
            ->updateFeatures($request->features)
            ->updateSocialMedia($request->social_media);

        return redirect()->route('admin.rest-centers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestCenter $restCenter)
    {
        $restCenter->delete();

        return response([], 200);
    }

    public function updateAccomodation(RestCenter $restCenter, Request $request)
    {
        $restCenter->update([ 'accomodation' => $request->accomodation ]);

        return response([], 200);
    }
}
