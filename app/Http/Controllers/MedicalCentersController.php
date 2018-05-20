<?php

namespace App\Http\Controllers;

use App\MedicalCenter;
use Illuminate\Http\Request;
use App\Search\MedicalCenterSearch;

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

        return view('medical-centers');
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
