<?php


namespace SeyedMR\VoyagerRecaptcha;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SeyedMR\VoyagerRecaptcha\Listeners\VoyagerRecaptchaRoute;

class VoyagerRecaptchaEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \TCG\Voyager\Events\RoutingAfter::class => [
            VoyagerRecaptchaRoute::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

}
