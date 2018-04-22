<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\ValidModelClass;

use App\Media;

class MainImagesController extends Controller
{
    public function store(Request $request, Media $mainImage)
    {
        $model = $request->class::findOrFail($request->id);

        $model->getMedia('main-image')
            ->each
            ->update([ 'collection_name' => 'image' ]);

        $mainImage->update([ 'collection_name' => 'main-image' ]);

        return response([ 'image' => $mainImage ]);
    }

    public function destroy(Media $mainImage)
    {
        $mainImage->update([ 'collection_name' => 'images' ]);

        return response([ 'image' => $mainImage ]);
    }
}
