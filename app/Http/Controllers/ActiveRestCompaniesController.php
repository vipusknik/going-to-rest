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
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $models = ActiveRestCompaniesSearch::by($request)
                ->with([ 'social_media', 'activities', 'media' ])
                ->get();

            return compact('models');
        }

        $activities = Activity::all();

        return view('active-rest-companies', compact('activities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActiveRestCompany  $activeRestCompany
     * @return \Illuminate\Http\Response
     */
    public function show(ActiveRestCompany $activeRestCompany)
    {
        //
    }
}
