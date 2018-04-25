<?php

namespace App\Http\Controllers\Admin;

use App\ActiveRestCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
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
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => [ 'required', Rule::unique('active_rest_companies', 'name') ],
            'location' => 'required',
            'activities' => 'required', // there must be at least one activity
            'activities.*' => 'required' //each activity requires cost
        ]);

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
        //
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
