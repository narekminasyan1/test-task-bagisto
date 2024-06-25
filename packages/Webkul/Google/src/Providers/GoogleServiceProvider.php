<?php

namespace Webkul\Google\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class GoogleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/admin-routes.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'google');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/admin-menu.php', 'menu.admin'
        );
    }
}
