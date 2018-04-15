<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\ValidModelClass;

class PaidCompaniesController extends Controller
{
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $model = $request->class::findOrFail($request->id);

        $model->update([ 'is_paid' => true ]);

        return response([], 200);
    }

    public function destroy(Request $request)
    {
        $this->validateRequest($request);

        $model = $request->class::findOrFail($request->id);

        $model->update([ 'is_paid' => false ]);

        return response([], 200);
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'class' => [ 'required', new ValidModelClass ],
            'id' => 'required'
        ]);
    }
}
