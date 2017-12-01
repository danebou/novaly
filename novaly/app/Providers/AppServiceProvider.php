<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // We always load the prodcuct category tree when displaying the category sidebar
        view()->composer('categories.sidebar', function ($view) {
            $view->with('categories', \App\Entities\ProductCategory::categoryTree());
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
