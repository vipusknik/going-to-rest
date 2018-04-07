<?php

/**
 * Admin  routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    /**
     * Rest centers
     */
    Route::resource('rest-centers', 'RestCentersController', [ 'as' => 'admin' ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
