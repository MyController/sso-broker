<?php

namespace MyController\SSOBroker\Providers;

use Illuminate\Support\ServiceProvider;
use MyController\SSOBroker\SSOBroker;

class SSOBrokerProvider extends ServiceProvider
{
    /**
     * 指定提供者加载是否延缓。
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * 运行注册后的启动服务。
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../../config/sso-broker.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('sso-broker.php');
        } else {
            $publishPath = base_path('config/sso-broker.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * 注册服务提供者。
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/sso-broker.php', 'sso-broker'
        );

        $this->app->singleton('MyController\SSOBroker\Providers\SSOBroker', function ($app) {
            return new SSOBroker($app);
        });
    }

    /**
     * 获取提供者所提供的服务。
     * PS: defer 属性设置为 true 时会使用本方法
     *
     * @return array
     */
    public function provides()
    {
        return ['MyController\SSOBroker\Providers\SSOBroker'];
    }

}
