<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\ValidModelClass;

use App\Media;

class ImagesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:20000',
            'class' => [ 'required', new ValidModelClass ],
            'id' => 'required'
        ]);

        $model = $request->class::findOrFail($request->id);

        $image = $model
            ->addMedia($request->image)
            ->preservingOriginal()
            ->usingFileName($this->composeFileName($request->image))
            ->toMediaCollection('images');

        return compact('image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $image)
    {
        $image->delete();

        return response([], 200);
    }

    private function composeFileName($file)
    {
        return str_slug($file->getClientOriginalName()) . '.' . $file->extension();
    }
}
