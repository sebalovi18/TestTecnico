<?php

namespace App\Providers;

use App\Services\User\ServiceUser;
use App\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\ServiceProvider;

class UserRegisterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceUser::class , function($app){
            return new ServiceUser($app->make(User::class) , $app->make(Hasher::class));
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
