<?php

namespace App\Providers;
use App\Repositories\Interfaces\InventoryRepositoryInterface;
use App\Repositories\Eloquent\InventoryRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\NavbarComposer;
use App\Models\Brand;
use Illuminate\Pagination\Paginator;
use App\View\Composers\SettingComposer;

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


public function boot()
{
    View::composer(
        'customer.layouts.navbar',
        NavbarComposer::class
    );

    View::composer(
        'customer.layouts.footer',
        SettingComposer::class
    );

    View::composer(
        'customer.contact',
        SettingComposer::class
    );

    Paginator::useTailwind();
}
}
