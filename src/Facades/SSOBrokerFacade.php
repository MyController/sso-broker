<?php

namespace MyController\SSOBroker\Facades;

use Illuminate\Support\Facades\Facade;

class SSOBrokerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MyController\SSOBroker\Providers\SSOBroker';
    }
}
