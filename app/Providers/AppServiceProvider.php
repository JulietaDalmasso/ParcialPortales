<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Repositories\NovedadRepository;
use App\Repositories\EloquentNovedadRepository;
use App\Repositories\QueryBuilderNovedadRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //registro el uso de EloquentNovedadRepositorie cada vez que se solicite NovedadRepositorie
        $this->app->bind(NovedadRepository::class, 
        QueryBuilderNovedadRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
