<?php

namespace App\Http\Controllers\Admin;

use App\HuntingCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\HuntingPlace;
use App\Animal;

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
            $query = $request->input('query');

            $models = HuntingCompany::where('name', 'like', "%$query%")->get();

            return compact('models');
        }

        $models = HuntingCompany::latest()->get();

        return view('admin.hunting-companies.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = HuntingPlace::whereType('region')->get();
        $places = HuntingPlace::whereType('place')->get();
        $animals = Animal::all();

        return view('admin.hunting-companies.create', compact('regions', 'places', 'animals'));
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
            'hunting_region_id' => [ 'required', Rule::exists('hunting_places', 'id') ],
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
        $huntingCompany->load('animals', 'media', 'social_media');

        return [ 'model' => $huntingCompany ];
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
        $huntingCompany->delete();
    }
}
