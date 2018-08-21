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
    public function index()
    {
        $models = HuntingCompany::with([ 'social_media', 'animals', 'media', 'region' ])
            ->orderBy('is_paid', 'DESC')
            ->orderBy('name')
            ->get();

        $regions = Region::all();

        return view('hunting-companies.index', compact('models', 'regions'));
    }

    public function search(Request $request)
    {
        $models = HuntingCompaniesSearch::by($request)
            ->with([ 'social_media', 'animals', 'media' ])
            ->orderBy('is_paid', 'DESC')
            ->orderBy('name')
            ->get();

        return compact('models');
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
