<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $results = collect([]);

        $models = [
            \App\KidCamp::class,
            \App\RestCenter::class,
            \App\MedicalCenter::class,
            \App\HuntingCompany::class,
            \App\ActiveRestCompany::class,
        ];

        foreach ($models as $model) {
            $models = $model::nameLike("%$request->q%")
                ->with($model::relations())
                ->get();

            $models->each(function ($item) use ($results) {
                $results->push($item);
            });
        }

        $results = $results->sortBy(function($model) {
            return sprintf('%-12s%s', !$model->is_paid, $model->name);
        });

        return view('search', compact('results'));
    }
}
