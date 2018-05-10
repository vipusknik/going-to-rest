<?php

namespace App\Http\Controllers\Admin;

use App\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [ 'models' => Animal::all() ];
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
            'name' => [ 'required', Rule::unique('animals', 'name') ],
            'type' => [ 'required', Rule::in([ 'animal', 'bird', 'fish' ]) ],
            'seasons.0' => 'required'
        ]);

        $model = Animal::create([
            'name' => $request->name,
            'type' => $request->type,
            'winter' => in_array('winter', $request->seasons),
            'summer' => in_array('summer', $request->seasons),
            'spring' => in_array('spring', $request->seasons),
            'autumn' => in_array('autumn', $request->seasons)
        ]);

        return compact('model');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => [ 'required', Rule::unique('animals', 'name')->ignore($animal->id) ],
            'type' => [ 'required', Rule::in([ 'animal', 'bird', 'fish' ]) ],
            'seasons.0' => 'required'
        ]);

        $animal->update([
            'name' => $request->name,
            'type' => $request->type,
            'winter' => in_array('winter', $request->seasons),
            'summer' => in_array('summer', $request->seasons),
            'spring' => in_array('spring', $request->seasons),
            'autumn' => in_array('autumn', $request->seasons)
        ]);

        return [ 'model' => $animal ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        abort_if($animal->companies->count(), 422);
        $animal->delete();
    }
}
