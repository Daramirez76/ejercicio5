<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\LibroInterface;
use App\Repositories\Eloquent\LibroRepository;
use App\Repositories\Interfaces\VehiculoInterface;
use App\Repositories\Eloquent\VehiculoRepository;

class ProviderBiblioteca extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LibroInterface::class, LibroRepository::class);
        $this->app->bind(VehiculoInterface::class, VehiculoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
