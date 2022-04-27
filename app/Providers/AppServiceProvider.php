<?php

declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\CarServiceInterface;
use App\Interfaces\TripServiceInterface;
use App\Services\CarService;
use App\Services\TripService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }

    public function register(): void
    {
        $this->app->bind(CarServiceInterface::class, CarService::class);
        $this->app->bind(TripServiceInterface::class, TripService::class);
    }
}
