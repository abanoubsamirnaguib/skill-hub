<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\paginator;

// use Illuminate\Http\Resources\Json\JsonResource;

use  App\View\Components\footerComponent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        paginator::useBootstrap();

        // JsonResource::withoutWrapping();

        Blade::component('resources\views\components\footer-component', footerComponent::class);
    }
}
