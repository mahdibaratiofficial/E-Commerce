<?php

namespace App\Providers;

use App\Services\Cart\CartService;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartService::class,function($app){
            return new CartService('cookie');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);
    }
}