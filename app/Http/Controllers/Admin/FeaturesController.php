<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;

class FeaturesController extends Controller
{
    public function store(FeatureRequest $request)
    {
        $feature = Feature::create($request->all());

        return compact('feature');
    }

    public function update(FeatureRequest $request, Feature $feature)
    {
        $feature->update([ 'name' => $request->name ]);

        return [ 'model' => $feature ];
    }

    public function destroy(Feature $feature)
    {
        abort_if(\DB::table('featurables')->where('feature_id', $feature->id)->get()->count(), 422);

        $feature->delete();
    }
}
