<?php

namespace App\Http\Controllers\Admin;

use App\MedicalCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feature;

class MedicalCentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalCenters = MedicalCenter::all();

        $features = Feature::whereBelongsTo(Feature::OF_MEDICAL_CENTER)->get();

        return view('admin.medical-centers.index', compact('medicalCenters', 'features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalCenter $medicalCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalCenter $medicalCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalCenter $medicalCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalCenter $medicalCenter)
    {
        //
    }
}
