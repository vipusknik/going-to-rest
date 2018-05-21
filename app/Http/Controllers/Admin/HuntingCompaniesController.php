<?php

namespace App\Http\Controllers\Admin;

use App\HuntingCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Region;
use App\Http\Requests\HuntingCompanyRequest;

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
        $regions = Region::all();
        $animals = Animal::all();

        return view('admin.hunting-companies.create', compact('regions', 'animals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HuntingCompanyRequest $request)
    {
        $data = $request->except([ 'animals', 'social_media' ]);

        $data['hunting'] = $request->hunting === 'on';
        $data['fishing'] = $request->fishing === 'on';

        HuntingCompany::create($data)
            ->attachSocialMedia($request->social_media)
            ->animals()
            ->attach($this->prepareAnimals($request->animals));

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
        $huntingCompany->load('social_media', 'animals');
        $regions = Region::all();
        $animals = Animal::all();

        return view('admin.hunting-companies.edit', compact('huntingCompany', 'regions', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HuntingCompany  $huntingCompany
     * @return \Illuminate\Http\Response
     */
    public function update(HuntingCompanyRequest $request, HuntingCompany $huntingCompany)
    {
        $data = $request->except([ 'animals', 'social_media' ]);

        $data['hunting'] = $request->hunting === 'on';
        $data['fishing'] = $request->fishing === 'on';

        $huntingCompany->update($data);

        $huntingCompany->updateSocialMedia($request->social_media);

        $huntingCompany->animals()->detach();
        $huntingCompany->animals()->attach($this->prepareAnimals($request->animals));

        return redirect()->route('admin.hunting-companies.index')->withFlash('Сохранено');
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

    protected function prepareAnimals($animals)
    {
        $animals = (array) $animals;

        foreach ($animals as $id => $description) {
            $animals[$id] = [ 'description' => $description ];
        }

        return $animals;
    }
}
