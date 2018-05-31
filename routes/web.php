<?php

// Route::group([ 'middleware' => [ 'auth', 'admin' ] ], function () {
    Route::view('/', 'home');

    /**
     * Rest centers
     */
    Route::get('/pljazhnyj-otdyh', 'RestCentersController@index')->name('rest-centers.index');
    Route::get('/pljazhnyj-otdyh/search', 'RestCentersController@search')->name('rest-centers.search');
    Route::get('/pljazhnyj-otdyh/{rest_center}', 'RestCentersController@show')->name('rest-centers.show');

    /**
     * Medical centers
     */
    Route::get('/medicinskij-turizm', 'MedicalCentersController@index')->name('medical-centers.index');
    Route::get('/medicinskij-turizm/search', 'MedicalCentersController@search')->name('medical-centers.search');
    Route::get('/medicinskij-turizm/{medical_center}', 'MedicalCentersController@show')->name('medical-centers.show');

    /**
     * Kid camps
     */
    Route::get('/detskij-otdyh', 'KidCampsController@index')->name('kid-camps.index');
    Route::get('/detskij-otdyh/search', 'KidCampsController@search')->name('kid-camps.search');
    Route::get('/detskij-otdyh/{kid_camp}', 'KidCampsController@show')->name('kid-camps.show');

    /**
     * Active Rest Companies
     */
    Route::get('/aktivnyj-otdyh', 'ActiveRestCompaniesController@index')->name('active-rest-companies.index');
    Route::get('/aktivnyj-otdyh/search', 'ActiveRestCompaniesController@search')->name('active-rest-companies.search');
    Route::get('/aktivnyj-otdyh/{active_rest_company}', 'ActiveRestCompaniesController@show')->name('active-rest-companies.show');

    /**
     * Fishing and hunting
     */
    Route::get('/ohota-i-rybalka', 'HuntingCompaniesController@index')->name('hunting-companies.index');
    Route::get('/ohota-i-rybalka/search', 'HuntingCompaniesController@search')->name('hunting-companies.search');
    Route::get('/ohota-i-rybalka/{hunting_company}', 'HuntingCompaniesController@show')->name('hunting-companies.show');
// });


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
