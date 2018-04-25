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
     * Paid companies
     */
    Route::post('/paid-companies', 'PaidCompaniesController@store')->name('admin.paid-companies.store');
    Route::delete('/paid-companies', 'PaidCompaniesController@destroy')->name('admin.paid-companies.destroy');

    /**
     * Images
     */
    Route::post('/images', 'ImagesController@store')->name('admin.images.store');
    Route::delete('/images/{image}', 'ImagesController@destroy')->name('admin.images.destroy');

    /**
     * Main images
     */
    Route::post('/main-images/{main_image}', 'MainImagesController@store')->name('admin.main-images.store');
    Route::delete('/main-images/{main_image}', 'MainImagesController@destroy')->name('admin.main-images.destroy');

    /**
     * Rest centers
     */
    Route::resource('rest-centers', 'RestCentersController', [ 'as' => 'admin' ]);

    /**
     * Rest center accomodation description
     */
    Route::patch(
        'rest-centers/{rest_center}/accomodation-description/update',
        'RestCentersController@updateAccomodation'
    )
    ->name('admin.rest-centers.accomodation-description.update');

    /**
     * Rest center accomodations
     */
    Route::resource('rest-centers.accomodations', 'RestCenterAccomodationsController', [ 'as' => 'admin' ])
        ->except([ 'create', 'edit', 'show' ]);

    Route::delete('rest-centers/{rest_center}/media/{media}', 'RestCenterMediaController@destroy')
        ->name('admin.rest-centers.media.destroy');

    /**
     * Features
     */
    Route::post('features', 'FeaturesController@store')->name('admin.features.store');

    /**
     * Medical centers
     */

    Route::resource('medical-centers', 'MedicalCentersController', [ 'as' => 'admin' ]);

    /**
     * Kid camps
     */
    Route::resource('kid-camps', 'KidCampsController', [ 'as' => 'admin' ]);

    /**
     * Active rest companies
     */
    Route::resource('active-rest-companies', 'ActiveRestCompaniesController', [ 'as' => 'admin' ]);

    /**
     * Activities
     */
    Route::post('activities', 'ActivitiesController@store')->name('admin.activities.store');
});

Auth::routes();
