<?php

namespace App\Http\Controllers;

use App\MedicalCenter;
use Illuminate\Http\Request;
use App\Search\MedicalCenterSearch;
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
            $models = MedicalCenterSearch::by($request)
                ->with([ 'social_media', 'features', 'media' ])
                ->get();

            return compact('models');
        }

        $types = Feature::whereBelongsTo(Feature::OF_MEDICAL_CENTER)
            ->whereCategory(Feature::CATEGORY_TREATMENT_TYPES)
            ->get();

        return view('medical-centers', compact('types'));
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
}
