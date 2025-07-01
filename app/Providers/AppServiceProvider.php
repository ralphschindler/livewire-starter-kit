<?php

namespace App\Providers;

use App\View\Layouts\App;
use App\View\Layouts\Guest;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        config(['livewire.layout' => 'layouts.app']);

        // support App\View\Layouts\App as component
        Blade::componentNamespace('App\View\Layouts', 'layouts');

        // support <x-layouts::*> components
        Blade::anonymousComponentPath(
            resource_path('views/layouts'),
            'layouts'
        );

        // support <x-pages::*> components
        Blade::anonymousComponentPath(
            resource_path('views/pages'),
            'pages'
        );
    }
}
