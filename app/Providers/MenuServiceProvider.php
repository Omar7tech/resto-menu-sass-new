<?php

namespace App\Providers;

use App\Support\MenuContext;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(MenuContext::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(MenuContext $context): void
    {
        View::composer('*', function ($view) use ($context) {
            $view->with('menu', $context->get());
        });
    }
}
