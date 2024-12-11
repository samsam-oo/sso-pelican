<?php

namespace Mcraft\Sso;

use Illuminate\Support\ServiceProvider;
use Mcraft\Sso\Commands\GenerateSecretKey;

class SsoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            GenerateSecretKey::class,
        ]);

        // Registration of the configuration filess
        $this->publishes([
            __DIR__ . '/config/sso-mcraft.php' => config_path('sso-mcraft.php'),
        ], 'sso-mcraft');

        // Registration of routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function register()
    {
        // Download configuration file
        $this->mergeConfigFrom(
            __DIR__ . '/config/sso-mcraft.php',
            'sso-mcraft'
        );
    }
}
