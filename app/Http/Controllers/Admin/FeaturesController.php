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
}
