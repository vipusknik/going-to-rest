<?php

namespace App\Http\Controllers\Admin;

use App\MedicalCenter;
use Illuminate\Http\Request;
use App\Http\Requests\MedicalCentersRequest;
use App\Http\Controllers\Controller;
use App\Feature;
use App\City;
use App\Region;

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

            $models = MedicalCenter::where('name', 'like', "%$query%")
                ->get();

            return compact('models');
        }

        $medicalCenters = MedicalCenter::latest()->get();

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
        $features = Feature::whereBelongsTo(Feature::OF_MEDICAL_CENTER)
            ->get()
            ->groupBy('category');

        $cities = City::all();
        $regions = Region::all();

        return view('admin.medical-centers.create', compact('features', 'cities', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalCentersRequest $request)
    {
        MedicalCenter::create($request->except([ 'social_media', 'features' ]))
            ->attachSocialMedia($request->social_media)
            ->attachFeatures($request->features);

        return redirect()
            ->route('admin.medical-centers.index')
            ->withFlash('Медицинский центр добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalCenter $medicalCenter)
    {
        $medicalCenter->load('features', 'media', 'social_media', 'city', 'region');

        return [ 'model' => $medicalCenter ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalCenter $medicalCenter)
    {
        $medicalCenter->load('features');

        $features = Feature::whereBelongsTo(Feature::OF_MEDICAL_CENTER)
            ->get()
            ->groupBy('category');

        $cities = City::all();
        $regions = Region::all();

        return view('admin.medical-centers.edit', compact('medicalCenter', 'features', 'cities', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalCentersRequest $request, MedicalCenter $medicalCenter)
    {
        $medicalCenter->update($request->except([ 'features', 'social_media' ]));

        $medicalCenter
            ->updateFeatures($request->features)
            ->updateSocialMedia($request->social_media);

        return redirect()->route('admin.medical-centers.index');
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
