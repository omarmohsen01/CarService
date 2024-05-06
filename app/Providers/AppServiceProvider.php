<?php

namespace App\Providers;

use App\Http\Controllers\Interfaces\Dashboard\AdminSericeInterface;
use App\Http\Controllers\Interfaces\Dashboard\BrandSericeInterface;
use App\Http\Controllers\Interfaces\Dashboard\ModelSericeInterface;
use App\Http\Controllers\Interfaces\Dashboard\UserSericeInterface;
use App\Http\Controllers\Interfaces\Dashboard\VendorSparePartServiceInterface;
use App\Http\Controllers\Services\Dashboard\AdminService;
use App\Http\Controllers\Services\Dashboard\BrandService;
use App\Http\Controllers\Services\Dashboard\ModelService;
use App\Http\Controllers\Services\Dashboard\UserService;
use App\Http\Controllers\Services\Dashboard\VendorSparePartService;
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
        $this->app->bind(BrandSericeInterface::class, BrandService::class);
        $this->app->bind(ModelSericeInterface::class, ModelService::class);
        $this->app->bind(VendorSparePartServiceInterface::class, VendorSparePartService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
