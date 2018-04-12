<?php

Route::get('/', function() {
    return redirect('/admin/rest-centers');
});

Route::get('/admin', function() {
    return redirect('/admin/rest-centers');
});

/**
 * Admin  routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [ 'auth', 'admin' ] ], function () {

    /**
     * Rest centers
     */
    Route::resource('rest-centers', 'RestCentersController', [ 'as' => 'admin' ]);

    /**
     * Rest center accomodations
     */
    Route::resource('rest-centers.accomodations', 'RestCenterAccomodationsController', [ 'as' => 'admin' ])
        ->except([ 'create', 'edit', 'show' ]);

    /**
     * Rest center media
     */
    Route::post('rest-centers/{rest_center}/media', 'RestCenterMediaController@store')
        ->name('admin.rest-centers.media.store');

    /**
     * Features
     */
    Route::post('features', 'FeaturesController@store')->name('admin.features.store');
});

Auth::routes();
