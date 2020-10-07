<?php

namespace SeyedMR\VoyagerRecaptcha;

use Illuminate\Support\ServiceProvider;

class VoyagerRecaptchaServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $app = $this->app;


        $app['validator']->extend('voyager_recaptcha', function ($attribute, $value) use ($app) {
            return $app['voyager_recaptcha']->verifyResponse($value, $app['request']->getClientIp());
        });

        if ($app->bound('form')) {
            $app['form']->macro('voyager_recaptcha', function ($attributes = []) use ($app) {
                return $app['voyager_recaptcha']->display($attributes, $app->getLocale());
            });
        }
        $this->publishes([
            // Views
            __DIR__.'/../resources/views/vendor/voyager/login.blade.php' => resource_path('views/vendor/voyager/login.blade.php'),
            __DIR__ . '/config/voyager-recaptcha.php' => config_path('voyager-recaptcha.php'),
            // Controller
            __DIR__.'/../publishable/controllers/VoyagerRecaptchaAuthController.php' => app_path('Http/Controllers/Voyager/Auth/VoyagerRecaptchaAuthController.php')
        ], 'voyager-recaptcha');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('voyager_recaptcha', function ($app) {
            \Debugbar::info($app['config']);
            return new VoyagerRecaptcha(
                $app['config']['voyager-recaptcha.secret'],
                $app['config']['voyager-recaptcha.sitekey'],
                $app['config']['voyager-recaptcha.options']
            );
        });
        $this->app->register(VoyagerRecaptchaEventServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['voyager_recaptcha'];
    }
}
