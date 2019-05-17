<?php

namespace RayaFort\Plans;

use Illuminate\Support\ServiceProvider;
use RayaFort\Plans\Contracts\PlanInterface;
use RayaFort\Plans\Contracts\PlanFeatureInterface;

class PlansServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'plans');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
	        __DIR__ . '/../config/plans.php' => config_path('plans.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/../lang' => resource_path('lang/vendor/plans'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/../config/plans.php', 'plans');

        $this->app->bind(PlanInterface::class, config('plans.models.plan'));
        $this->app->bind(PlanFeatureInterface::class, config('plans.models.plan_feature'));

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //
    }
}
