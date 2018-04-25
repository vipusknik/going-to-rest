<?php

namespace App\Http\Controllers\Admin;

use App\ActiveRestCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActiveRestCompaniesRequest;
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
        $companies = ActiveRestCompany::latest()->get();

        return view('admin.active-rest-companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::all();

        return view('admin.active-rest-companies.create', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActiveRestCompaniesRequest $request)
    {
        $activities = [];

        foreach ((array) $request->activities as $id => $cost) {
            $activities[$id] = [ 'cost' => $cost ];
        }

        ActiveRestCompany::create($request->except([ 'activities', 'social_media' ]))
            ->attachSocialMedia($request->social_media)
            ->activities()
            ->attach($activities);

        return redirect()->route('admin.active-rest-companies.index')->withFlash('Добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActiveRestCompany  $activeRestCompany
     * @return \Illuminate\Http\Response
     */
    public function show(ActiveRestCompany $activeRestCompany)
    {
        $activeRestCompany->load('activities', 'social_media', 'media');

        return [ 'company' => $activeRestCompany ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActiveRestCompany  $activeRestCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(ActiveRestCompany $activeRestCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActiveRestCompany  $activeRestCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActiveRestCompany $activeRestCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActiveRestCompany  $activeRestCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActiveRestCompany $activeRestCompany)
    {
        //
    }
}
