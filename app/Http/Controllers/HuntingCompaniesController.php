<?php

namespace App\Http\Controllers;

use App\HuntingCompany;
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

        return view('hunting-companies.index', compact('regions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HuntingCompany  $HuntingCompany
     * @return \Illuminate\Http\Response
     */
    public function show(HuntingCompany $huntingCompany)
    {
        $huntingCompany->load([ 'social_media', 'animals', 'media', 'region' ]);

        $regions = Region::all();

        return view('hunting-companies.show', [
            'model' => $huntingCompany,
            'regions' => $regions
        ]);
    }
}
