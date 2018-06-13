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

            elseif (Route::is('medical-centers.*')) {
                $category = Banner::CATEGORY_MEDICAL_CENTERS;
            }

            elseif (Route::is('active-rest-companies.*')) {
                $category = Banner::CATEGORY_ACTIVE_REST;
            }

            elseif (Route::is('kid-camps.*')) {
                $category = Banner::CATEGORY_KID_CAMPS;
            }

            elseif (Route::is('hunting-companies.*')) {
                $category = Banner::CATEGORY_HUNTING;
            }

            else {
                $category = Banner::CATEGORY_REST_CENTERS;
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
