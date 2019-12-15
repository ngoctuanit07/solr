<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Solarium\Client;
class SolariumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected $defer = true;
    public function register()
    {
        //
        $this->app->bind(Client::class, function ($app) {
            return new Client($app['config']['solarium']);
        });
    }
    public function provides()
    {
        return [Client::class];
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
