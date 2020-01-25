<?php

namespace App\Modules\Programa\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('programa', 'Resources/Lang', 'app'), 'programa');
        $this->loadViewsFrom(module_path('programa', 'Resources/Views', 'app'), 'programa');
        $this->loadMigrationsFrom(module_path('programa', 'Database/Migrations', 'app'), 'programa');
        $this->loadFactoriesFrom(module_path('programa', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
