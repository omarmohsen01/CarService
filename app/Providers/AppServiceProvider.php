<?php

namespace App\Providers;

use App\Http\Controllers\Interfaces\Dashboard\AdminSericeInterface;
use App\Http\Controllers\Interfaces\Dashboard\UserSericeInterface;
use App\Http\Controllers\Services\Dashboard\AdminService;
use App\Http\Controllers\Services\Dashboard\UserService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserSericeInterface::class, UserService::class);
        $this->app->bind(AdminSericeInterface::class, AdminService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
