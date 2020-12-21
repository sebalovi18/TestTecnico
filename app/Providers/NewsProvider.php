<?php

namespace App\Providers;

use App\Models\News;
use App\Services\News\ServiceNews;
use GuzzleHttp\Client;
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
            return new ServiceNews(new Client(['base_uri'=>env('API_HACKERNEWS_BASE_URI')]),
                                   $app->make(News::class));
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
