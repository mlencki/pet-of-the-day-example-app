<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\RandomPhotoProvider;
use App\Services\UnsplashService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RandomPhotoProvider::class, UnsplashService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
