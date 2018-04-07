<?php

/**
 * Admin  routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    /**
     * Rest centers
     */
    Route::resource('rest-centers', 'RestCentersController');
});
