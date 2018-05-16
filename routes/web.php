<?php

Route::group([ 'middleware' => [ 'auth', 'admin' ] ], function () {
    Route::view('/', 'home');

    /**
     * Rest centers
     */
    Route::get('/pljazhnyj-otdyh', 'RestCentersController@index')->name('rest-centers.index');
});


/**
 * Admin  routes
 */

Route::get('/admin', function() {
    return redirect('/admin/rest-centers');
});

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
    Route::apiResource('rest-centers.accomodations', 'RestCenterAccomodationsController', [ 'as' => 'admin' ]);

    /**
     * Features
     */
    Route::apiResource('features', 'FeaturesController', [ 'as' => 'admin' ]);

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
    Route::apiResource('activities', 'ActivitiesController', [ 'as' => 'admin' ]);

    /**
     * Hunting companies
     */
    Route::resource('hunting-companies', 'HuntingCompaniesController', [ 'as' => 'admin' ]);

    /**
     * Hunting regions
     */
    Route::apiResource('hunting-places', 'HuntingPlacesController', [ 'as' => 'admin' ]);

    /**
     * Animals
     */
    Route::apiResource('animals', 'AnimalsController', [ 'as' => 'admin' ]);
});

Auth::routes();
