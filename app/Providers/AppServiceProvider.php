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

        $this->loadViewComponentsAs('layouts', [
            'guest' => null, // Guest::class,
            'app' => null, // App::class,
        ]);

        Blade::anonymousComponentPath(
            resource_path('views/layouts'),
            'layouts'
        );

        // page partials
        Blade::anonymousComponentPath(
            resource_path('views/pages'),
            'pages'
        );
    }
}
