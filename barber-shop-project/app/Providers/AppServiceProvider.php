<?php

namespace App\Providers;

use App\Repositories\Users\UserORM;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Services\ServiceORM;
use App\Repositories\Schedule\ScheduleORM;
use App\Repositories\Users\UserRepository;
use App\Repositories\Services\ServiceRepository;
use App\Repositories\Schedule\ScheduleRepository;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\Services\ServiceRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ServiceRepository::class,
            ServiceORM::class,
        );

        $this->app->bind(
            UserRepository::class,
            UserORM::class,
        );

        $this->app->bind(
            ScheduleRepository::class,
            ScheduleORM::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
