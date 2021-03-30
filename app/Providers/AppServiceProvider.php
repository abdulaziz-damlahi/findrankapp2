<?php

namespace App\Providers;


use App\Models\users;
use App\Observers\UserObserver;
use CloudCreativity\LaravelJsonApi\LaravelJsonApi;
use Illuminate\Support\ServiceProvider;

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

        //
        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            LaravelJsonApi::defaultApi('v1');
            users::observe(UserObserver::class);
            //Check for 'lang' cookie


        }

}
