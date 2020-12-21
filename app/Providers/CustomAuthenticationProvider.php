<?php

namespace App\Providers;

use App\Services\Authentication\ServiceAuthentication;
use App\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\ServiceProvider;

class CustomAuthenticationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceAuthentication::class , function($app){
            return new ServiceAuthentication($app->make(AuthManager::class),$app->make(Hasher::class),$app->make(User::class));
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
