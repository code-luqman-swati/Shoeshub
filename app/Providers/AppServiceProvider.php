<?php

namespace App\Providers;
use App\Repositories\Interfaces\InventoryRepositoryInterface;
use App\Repositories\Eloquent\InventoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
  
public function register(): void
{
    $this->app->bind(
        InventoryRepositoryInterface::class,
        InventoryRepository::class
    );
}

    /**
     * Bootstrap any application services.
     */
   public function boot(): void
{
   
}
}
