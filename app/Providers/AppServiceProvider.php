<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Route;
use App\Banner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('partials.banners', function ($view) {
            if (Route::is('rest-centers.*')) {
                $category = Banner::CATEGORY_REST_CENTERS;
            }

            if (Route::is('medical-centers.*')) {
                $category = Banner::CATEGORY_MEDICAL_CENTERS;
            }

            if (Route::is('active-rest.*')) {
                $category = Banner::CATEGORY_ACTIVE_REST;
            }

            if (Route::is('kid-camps.*')) {
                $category = Banner::CATEGORY_KID_CAMPS;
            }

            if (Route::is('hunting-companies.*')) {
                $category = Banner::CATEGORY_HUNTING;
            }

            $banners = Banner::whereCategory($category)->get();

            $view->with('banners', $banners);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
