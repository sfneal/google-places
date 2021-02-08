<?php

namespace Sfneal\GooglePlaces\Providers;

use Illuminate\Support\ServiceProvider;

class GooglePlacesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any Healthy services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config file
        $this->publishes([
            __DIR__.'/../../config/google-places.php' => base_path('config/google-places.php'),
        ], 'config');

        // Map places routes check paths
        $this->loadRoutesFrom(__DIR__.'/../../routes/google-places.php');

    }

    /**
     * Register any Healthy services.
     *
     * @return void
     */
    public function register()
    {
        // Load config file
        $this->mergeConfigFrom(__DIR__.'/../../config/google-places.php', 'google-places');
    }
}
