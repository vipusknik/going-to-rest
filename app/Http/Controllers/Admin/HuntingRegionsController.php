<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\HuntingRegion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HuntingRegionsController extends Controller
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
            'name' => [ 'required', Rule::unique('hunting_regions', 'name') ]
        ]);

        $region = HuntingRegion::create([ 'name' => $request->name ]);

        return compact('region');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HuntingRegion  $huntingRegion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HuntingRegion $huntingRegion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HuntingRegion  $huntingRegion
     * @return \Illuminate\Http\Response
     */
    public function destroy(HuntingRegion $huntingRegion)
    {
        //
    }
}
