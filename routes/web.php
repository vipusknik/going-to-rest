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
    Route::get('rest-centers/{rest_center}/accomodations', 'RestCenterAccomodationsController@index')
        ->name('admin.rest-centers.accomodations.index');

    Route::post('rest-centers/{rest_center}/accomodations', 'RestCenterAccomodationsController@store')
        ->name('admin.rest-centers.accomodations.store');

    /**
     * Features
     */
    Route::post('features', 'FeaturesController@store')->name('admin.features.store');
});

Auth::routes();
