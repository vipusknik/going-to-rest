<?php

namespace App\Http\Controllers;

use App\MedicalCenter;
use Illuminate\Http\Request;
use App\Search\MedicalCenterSearch;
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
            $models = MedicalCenterSearch::by($request)
                ->with([ 'social_media', 'features', 'media' ])
                ->get();

            return compact('models');
        }

        $types = Feature::whereBelongsTo(Feature::OF_MEDICAL_CENTER)
            ->whereCategory(Feature::CATEGORY_TREATMENT_TYPES)
            ->get();

        $cities = City::all();
        $regions = Region::all();

        return view('medical-centers.index', compact('types', 'cities', 'regions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalCenter  $medicalCenter
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalCenter $medicalCenter)
    {
        $medicalCenter->load([ 'social_media', 'features', 'media' ]);

        $cities = City::all();
        $regions = Region::all();

        $types = []; // ugh

        return view('medical-centers.show', [
            'model' => $medicalCenter,
            'cities' => $cities,
            'regions' => $regions,
            'types' => $types
        ]);
    }
}
