<?php

namespace App\Http\Controllers\Admin;

use App\RestCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use App\Feature;
use App\Accomodation;

class RestCenterAccomodationsController extends Controller
{
    public function index(RestCenter $restCenter)
    {
        $restCenter->load('accomodations.features');

        $features = Feature::whereBelongsTo(Feature::OF_ACCOMODATION)
            ->get()
            ->groupBy('category');

        return view('admin.rest-centers.accomodations.index', compact('restCenter', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestCenter $restCenter, Request $request)
    {
        $this->validateRequest($request);

        $restCenter
            ->accomodations()
            ->create($request->except('features'))
            ->attachFeatures($request->features);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestCenter $restCenter, Accomodation $accomodation)
    {
        $this->validateRequest($request);

        $accomodation->update($request->except('features'));

        $accomodation->updateFeatures($request->features);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestCenter $restCenter, Accomodation $accomodation)
    {
        $accomodation->delete();

        return response([], 200);
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'guest_count' => 'required|integer',
            'price_per_day' => 'required|integer',
            'type' => [ 'required', Rule::in(Accomodation::types()) ],
        ]);
    }
}
