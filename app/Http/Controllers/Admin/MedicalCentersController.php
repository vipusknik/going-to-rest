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
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $query = $request->input('query');

            $medicalCenters = MedicalCenter::where('name', 'like', "%$query%")
                ->with([ 'features' ])
                ->get();

            return compact('medicalCenters');
        }

        $medicalCenters = MedicalCenter::with([ 'features' ])->latest()->get();

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
        $medicalCenter->load('features', 'media', 'social_media');

        return response(compact('medicalCenter'), 200);
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
        $medicalCenter->delete();

        return response([], 200);
    }
}
