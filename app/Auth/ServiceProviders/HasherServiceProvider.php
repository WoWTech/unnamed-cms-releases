<?php

namespace App\Auth\ServiceProviders;

use App\Auth\Hashing\ShaHasher;

use Illuminate\Support\ServiceProvider;

class HasherServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('shaHash', function () {
            return new ShaHasher;
        });
    }

    public function provides()
    {
        return ['shaHash'];
    }
}
