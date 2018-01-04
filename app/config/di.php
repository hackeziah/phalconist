<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;

use Phalcon\Flash\Direct as Flash;

$di = new FactoryDefault();

//db connection
$di->set('db',
    function () use ($config) {
        return new DbAdapter([
            'host' => $config->database->host,
            'username' => $config->database->username,
            'password' => $config->database->password,
            'dbname' => $config->database->dbname,
            'charset' => $config->database->charset
        ]);
    }
);

//url resolver
$di->set('url',
    function () use ($config) {
        $url = new UrlResolver();
        $url->setBaseUri(
            $config->application->baseUri
        );
        return $url;
    },
    true
);

// Registering the view component
$di->set('view',
    function () use ($config) {
        $view = new View();
        $view->setViewsDir($config->application->viewsDir);

        $view->registerEngines([
            '.volt' => function ($view, $di) use ($config) {
                $volt = new VoltEngine($view, $di);
                $volt->setOptions([
                    'compiledPath' => $config->application->cacheDir,
                    'compiledSeparator' => '_',
                ]);
                return $volt;
            }
        ]);

        return $view;
    }
);

// Registering a dispatcher to instruct namespace
$di->set('dispatcher',
    function () {
        $dispatcher = new Dispatcher();
        $dispatcher->setDefaultNamespace('MyApp\Controllers');
        return $dispatcher;
    }
);

//register session -
$di->set('session',
    function () {
        $session = new SessionAdapter();
        $session->start();
        return $session;
    }
);

//flash service with custom css class
$di->set(
    'flash', 
    function () {
        return new Flash([
            'error' => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice' => 'alert alert-info',
            'warning' => 'alert alert-warning'
        ]);
    }
);