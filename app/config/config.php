<?php

use Phalcon\Config;

return new Config([
    'database' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'studentdb',
        'charset' => 'utf8'
    ],
    'application' => [
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir' => APP_PATH . '/models/',
        'viewsDir' => APP_PATH . '/views/',
        'cacheDir' => APP_PATH . '/cache/',
        'formsDir' => APP_PATH . '/forms/',
        'baseUri' => '/phalcon/'
    ]
]);