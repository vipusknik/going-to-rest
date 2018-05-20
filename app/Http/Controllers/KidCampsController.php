<?php

namespace App\Http\Controllers;

use App\KidCamp;
use Illuminate\Http\Request;
use App\City;

class KidCampsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $models = KidCamp::with([ 'social_media', 'features', 'media' ])
                ->get();

            return compact('models');
        }

        $cities = City::all();

        return view('kid-camps', compact('cities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KidCamp  $kidCamp
     * @return \Illuminate\Http\Response
     */
    public function show(KidCamp $kidCamp)
    {
        //
    }
}
