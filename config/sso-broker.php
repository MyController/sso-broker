<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SSO-Broker 配置文件
    |--------------------------------------------------------------------------
    |
    | SSO-Broker 连接到服务端 SSO-Server 前, 需要配置三个参数:
    |
    |   SSO-Server-Url
    |   SSO-Broker-Id
    |   SSO-Broker-Secret
    |
    */

    'url' => 'http://sso.local.ebrun.com/sso-server', // Url of SSO server

    'broker' => 'Alice', // My identifier, given by SSO provider.

    'secret' => '8iwzik1bwd', // My secret word, given by SSO provider.

];
