<?php

namespace App\Http\Controllers\Admin;

use App\HuntingPlace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class HuntingPlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [ 'required', Rule::unique('hunting_places', 'name') ],
            'type' => [ 'required', Rule::in([ 'place', 'region' ]) ],
        ]);

        $model = HuntingPlace::create($request->all());

        return compact('model');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HuntingPlace  $huntingPlace
     * @return \Illuminate\Http\Response
     */
    public function show(HuntingPlace $huntingPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HuntingPlace  $huntingPlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HuntingPlace $huntingPlace)
    {
        $request->validate([
            'name' => [ 'required', Rule::unique('hunting_places', 'name')->ignore($huntingPlace->id) ]
        ]);

        $huntingPlace->update([ 'name' => $request->name ]);

        return [ 'model' => $huntingPlace ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HuntingPlace  $huntingPlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(HuntingPlace $huntingPlace)
    {
        abort_if($huntingPlace->companies->count(), 422);

        $huntingPlace->delete();
    }
}
