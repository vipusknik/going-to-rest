<?php

namespace App\Http\Controllers\Admin;

use App\HuntingCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\HuntingRegion;
use App\HuntingPlace;

class HuntingCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = HuntingRegion::all();
        $places = HuntingPlace::all();

        return view('admin.hunting-companies.create', compact('regions', 'places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [ 'required', Rule::unique('hunting_companies', 'name') ],
            'hunting_place_id' => [ 'required', Rule::exists('hunting_places', 'id') ],
            'hunting_region_id' => [ 'required', Rule::exists('hunting_regions', 'id') ],
        ]);
        // TODO: at least one hunting type should be true

        $data = $request->except([ 'animals', 'social_media' ]);

        $data['hunting'] = $request->hunting === 'on';
        $data['fishing'] = $request->fishing === 'on';

        HuntingCompany::create($data)
            ->attachSocialMedia($request->social_media)
            ->animals()
            ->attach($request->animals);

        return redirect()->route('admin.hunting-companies.index')->withFlash('Сохранено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HuntingCompany  $huntingCompany
     * @return \Illuminate\Http\Response
     */
    public function show(HuntingCompany $huntingCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HuntingCompany  $huntingCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(HuntingCompany $huntingCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HuntingCompany  $huntingCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HuntingCompany $huntingCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HuntingCompany  $huntingCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(HuntingCompany $huntingCompany)
    {
        //
    }
}
