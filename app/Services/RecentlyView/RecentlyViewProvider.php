<?php

namespace App\Services\RecentlyView;

use Illuminate\Support\ServiceProvider;

class RecentlyViewProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('RecentlyViewService', function ($app)
        {
            return new RecentlyViewService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/recentlyview.php' => config_path('recentlyview.php')
        ], 'Recently View');
    }
}