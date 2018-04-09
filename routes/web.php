<?php

/**
 * Admin  routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [ 'auth', 'admin' ] ], function () {

    /**
     * Rest centers
     */
    Route::resource('rest-centers', 'RestCentersController', [ 'as' => 'admin' ]);

    /**
     * Features
     */
    Route::post('features', 'FeaturesController@store')->name('admin.features.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
