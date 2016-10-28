<?php

namespace MyController\SSOBroker;

use Jasny\SSO\Broker;
use MyController\SSOBroker\Exceptions\SSOBrokerException;

class SSOBroker extends Broker
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Class constructor
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        $broker = $this->app['config']->get('sso-broker');

        if (!$broker['url']) throw new \InvalidArgumentException("SSO server URL not specified");
        if (!$broker['broker']) throw new \InvalidArgumentException("SSO broker id not specified");
        if (!$broker['secret']) throw new \InvalidArgumentException("SSO broker secret not specified");

        $this->url = $broker['url'];
        $this->broker = $broker['broker'];
        $this->secret = $broker['secret'];

        if (isset($_COOKIE[$this->getCookieName()])) $this->token = $_COOKIE[$this->getCookieName()];
    }

}
