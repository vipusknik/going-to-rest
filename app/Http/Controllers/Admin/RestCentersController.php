<?php

namespace App\Http\Controllers\Admin;

use App\RestCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Reservoir;
use App\Feature;

class RestCentersController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::all();

        $features = Feature::all();

        return view('admin.rest-centers.create', compact('reservoirs', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(RestCenter $restCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestCenter $restCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestCenter $restCenter)
    {
        //
    }
}
