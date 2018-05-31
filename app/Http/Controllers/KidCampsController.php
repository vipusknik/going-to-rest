<?php

namespace App\Http\Controllers;

use App\KidCamp;
use Illuminate\Http\Request;
use App\City;
use App\Search\KidCampsSearch;

class KidCampsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();

        return view('kid-camps.index', compact('cities'));
    }

    public function search(Request $request)
    {
        $models = KidCampsSearch::by($request)
            ->with([ 'social_media', 'features', 'media', 'city' ])
            ->orderBy('name')
            ->get();

        return compact('models');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KidCamp  $kidCamp
     * @return \Illuminate\Http\Response
     */
    public function show(KidCamp $kidCamp)
    {
        $kidCamp->load([ 'social_media', 'features', 'media', 'city' ]);

         $cities = City::all();

        return view('kid-camps.show', [
            'model' => $kidCamp,
            'cities' => $cities
        ]);
    }
}
