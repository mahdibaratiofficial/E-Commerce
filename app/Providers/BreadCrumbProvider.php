<?php

namespace App\Providers;

use App\Services\BreadCrumb\BreadCrumbService;
use Illuminate\Support\ServiceProvider;

class BreadCrumbProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('BreadCrumb',function($app){
            return new BreadCrumbService();
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
