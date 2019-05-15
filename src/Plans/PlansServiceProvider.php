<?php

namespace RayaFort\Plans;

use Illuminate\Support\ServiceProvider;
use RayaFort\Plans\SubscriptionBuilder;
use RayaFort\Plans\SubscriptionResolver;
use RayaFort\Plans\Contracts\PlanInterface;
use RayaFort\Plans\Contracts\PlanFeatureInterface;
use RayaFort\Plans\Contracts\PlanSubscriptionInterface;
use RayaFort\Plans\Contracts\SubscriptionBuilderInterface;
use RayaFort\Plans\Contracts\SubscriptionResolverInterface;
use RayaFort\Plans\Contracts\PlanSubscriptionUsageInterface;

class PlansServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laraplans');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
	        __DIR__ . '/../config/plans.php' => config_path('plans.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/../lang' => resource_path('lang/vendor/laraplans'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/../config/plans.php', 'laraplans');

        $this->app->bind(PlanInterface::class, config('laraplans.models.plan'));
        $this->app->bind(PlanFeatureInterface::class, config('laraplans.models.plan_feature'));
        $this->app->bind(PlanSubscriptionInterface::class, config('laraplans.models.plan_subscription'));
        $this->app->bind(PlanSubscriptionUsageInterface::class, config('laraplans.models.plan_subscription_usage'));
        $this->app->bind(SubscriptionBuilderInterface::class, SubscriptionBuilder::class);
        $this->app->bind(SubscriptionResolverInterface::class, SubscriptionResolver::class);
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
