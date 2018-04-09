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
    public function __construct()
    {
        // $this->middle
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restCenters = RestCenter::with('reservoir')->latest()->get();
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
        $features = Feature::where('belongs_to', Feature::OF_REST_CENTER)->get();

        return view('admin.rest-centers.create', compact('reservoirs', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RestCentersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestCentersRequest $request)
    {
        $restCenter = RestCenter::create($request->except('features'))
            ->attachFeatures($request->features);

        return redirect()->route('admin.rest-centers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function show(RestCenter $restCenter)
    {
        $restCenter->load('reservoir', 'features');

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
        $restCenter->delete();

        return response([], 200);
    }
}
