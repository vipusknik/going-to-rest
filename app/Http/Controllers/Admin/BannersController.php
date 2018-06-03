<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = [
            Banner::CATEGORY_REST_CENTERS => 'Пляжный отдых',
            Banner::CATEGORY_MEDICAL_CENTERS => 'Медицинский туризм',
            Banner::CATEGORY_ACTIVE_REST => 'Активный отдых',
            Banner::CATEGORY_KID_CAMPS => 'Детский отдых',
            Banner::CATEGORY_HUNTING => 'Рыбалка и охота',
        ];

        $banners = Banner::orderBy('category')
            ->orderBy('order')
            ->get()
            ->groupBy('category');

        return view('admin.banners.index', compact('categories', 'banners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {
        $request->validate([
            'banner' => 'required|image'
        ]);

        return [ 'image_link' => Storage::url(request()->file('banner')->store('banners')) ];
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
            'order' => 'required|integer',
            'category' => 'required',
            'image_link' => 'required',
            'external_link' => 'required',
        ]);

        $banner = Banner::updateOrCreate([
            'category' => $request->category,
            'order' => $request->order,
        ], [
            'image_link' => $request->image_link,
            'external_link' => $request->external_link,
        ]);

        return compact('banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
    }
}
