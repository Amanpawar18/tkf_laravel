<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination::bootstrap-4');

        Schema::defaultStringLength(191);

        Validator::extend('referer_user', function () {
            return false;
        });

        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }
}
