<?php

namespace App\Http\Controllers\Admin;

use App\KidCamp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use App\Feature;

class KidCampsController extends Controller
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

            $kidCamps = KidCamp::where('name', 'like', "%$query%")->get();

            return compact('kidCamps');
        }

        $kidCamps = KidCamp::latest()->get();

        return view('admin.kid-camps.index', compact('kidCamps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::whereBelongsTo(Feature::OF_KID_CAMP)->get()->groupBy('category');

        return view('admin.kid-camps.create', compact('features'));
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
            'name' => [ 'required', Rule::unique('kid_camps', 'name') ],
            'location' => 'required',
        ]);

        KidCamp::create($request->except([ 'social_media', 'features' ]))
            ->attachSocialMedia($request->social_media)
            ->attachFeatures($request->features);

        return redirect()
            ->route('admin.kid-camps.index')
            ->withFlash('Детский лагерь добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KidCamp  $kidCamp
     * @return \Illuminate\Http\Response
     */
    public function show(KidCamp $kidCamp)
    {
        $kidCamp->load('features', 'media', 'social_media');

        return response(compact('kidCamp'), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KidCamp  $kidCamp
     * @return \Illuminate\Http\Response
     */
    public function edit(KidCamp $kidCamp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KidCamp  $kidCamp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KidCamp $kidCamp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KidCamp  $kidCamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(KidCamp $kidCamp)
    {
        //
    }
}
