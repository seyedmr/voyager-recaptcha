<?php

namespace SeyedMR\VoyagerRecaptcha\Facades;

use Illuminate\Support\Facades\Facade;

class VoyagerRecaptcha extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'voyager_recaptcha';
    }
}
