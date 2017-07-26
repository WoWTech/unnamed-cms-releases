<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Server;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.page-header', function($view)
        {
            $realm  = Server::status();
            $online = Server::playersOnline();
            $uptime = Server::uptime();
            $view->with('realm', $realm)->with('online', $online)->with('uptime', $uptime);
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
