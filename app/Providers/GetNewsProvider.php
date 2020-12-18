<?php

namespace App\Providers;

use App\Services\ServiceGetNews\ServiceGetNews;
use Illuminate\Support\ServiceProvider;

class GetNewsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceGetNews::class , function($app){
            return new ServiceGetNews($app->make('Illuminate\Http\Client\Factory'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
