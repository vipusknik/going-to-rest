<?php

namespace App\Http\Controllers;

use App\ActiveRestCompany;
use Illuminate\Http\Request;
use App\Search\ActiveRestCompaniesSearch;
use App\Activity;

class ActiveRestCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();

        return view('active-rest-companies.index', compact('activities'));
    }

    public function search(Request $request)
    {
        $models = ActiveRestCompaniesSearch::by($request)
            ->with([ 'social_media', 'activities', 'media' ])
            ->orderBy('name')
            ->get();

        return compact('models');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActiveRestCompany  $activeRestCompany
     * @return \Illuminate\Http\Response
     */
    public function show(ActiveRestCompany $activeRestCompany)
    {
        $activeRestCompany->load([ 'social_media', 'activities', 'media' ]);

        $activities = Activity::all();

        return view('active-rest-companies.show', [
            'model' => $activeRestCompany,
            'activities' => $activities
        ]);
    }
}
