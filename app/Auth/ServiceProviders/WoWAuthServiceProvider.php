<?php

namespace App\Auth\ServiceProviders;

use Auth;
use App\Auth\ShaUserProvider;
use Illuminate\Support\ServiceProvider;

class WoWAuthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('sha', function($app, array $config) {
            return new ShaUserProvider($this->app['shaHash'], $config['model']);
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
