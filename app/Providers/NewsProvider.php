<?php

namespace App\Providers;

use App\Models\FavoriteNews;
use App\Services\News\ServiceNews;
use App\User;
use Illuminate\Support\ServiceProvider;

class NewsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceNews::class , function($app){
            return new ServiceNews($app->make('Illuminate\Http\Client\Factory'),
                                   $app->make(FavoriteNews::class),
                                   $app->make(User::class));
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
