<?php

namespace App\Providers;

use App\Services\AdminSessionDriver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Session\SessionManager;

class AdminSessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->make(SessionManager::class)->extend('admin', function ($app) {
            $config = config('session.admin');
            $driver = new AdminSessionDriver();
            return $driver->createStore('admin', $config);
        });
    }
}
