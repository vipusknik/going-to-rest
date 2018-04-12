<?php

namespace App\Http\Controllers\Admin;

use App\RestCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestCenterMediaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RestCenter $restCenter)
    {
        $request->validate([ 'image' => 'required|image|max:10000' ]);

        $image = $restCenter
            ->addMedia($request->image)
            ->preservingOriginal()
            ->usingFileName($this->composeFileName($request->image))
            ->toMediaCollection('images');

        return response()->json([ 'image' => $image ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestCenter  $restCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestCenter $restCenter)
    {
        //
    }

    private function composeFileName($file)
    {
        return str_slug($file->getClientOriginalName()) . '.' . $file->extension();
    }
}
