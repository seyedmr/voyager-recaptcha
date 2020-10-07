<?php

namespace SeyedMR\VoyagerRecaptcha\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Route;

class VoyagerRecaptchaRoute
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $namespacePrefix = '\\'.'SeyedMR\VoyagerRecaptcha\Http\Controllers'.'\\';
        Route::post('login', ['uses' => $namespacePrefix.'VoyagerRecaptchaAuthController@postLogin', 'as' => 'postlogin']);
    }
}
