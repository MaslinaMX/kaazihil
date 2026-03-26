<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\MaintenanceModeComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pasar la variable de modo mantenimiento a todas las vistas
        view()->composer('*', MaintenanceModeComposer::class);
    }
}
