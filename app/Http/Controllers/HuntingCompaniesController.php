<?php

namespace App\Http\Controllers;

use App\ActiveRestCompany;
use Illuminate\Http\Request;
use App\Search\HuntingCompaniesSearch;
use App\Region;

class HuntingCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $models = HuntingCompaniesSearch::by($request)
                ->with([ 'social_media', 'animals', 'media' ])
                ->get();

            return compact('models');
        }

        $regions = Region::all();

        return view('hunting-companies', compact('regions'));
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
