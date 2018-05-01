<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [ 'activities' => Activity::all() ];
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
            'name' => [ 'required', Rule::unique('activities', 'name') ],
            'seasons.0' => 'required'
        ]);

        $activity = Activity::create([
            'name' => $request->name,
            'winter' => in_array('winter', $request->seasons),
            'summer' => in_array('summer', $request->seasons),
            'spring' => in_array('spring', $request->seasons),
            'autumn' => in_array('autumn', $request->seasons)
        ]);

        return compact('activity');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'name' => [ 'required', Rule::unique('activities', 'name')->ignore($activity->id) ],
            'seasons.0' => 'required'
        ]);

        $activity->update([
            'name' => $request->name,
            'winter' => in_array('winter', $request->seasons),
            'summer' => in_array('summer', $request->seasons),
            'spring' => in_array('spring', $request->seasons),
            'autumn' => in_array('autumn', $request->seasons)
        ]);

        return compact('activity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        abort_if($activity->companies()->count(), 422);

        $activity->delete();
    }
}
