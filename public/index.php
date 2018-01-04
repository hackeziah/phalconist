<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {

    //read the configuration
    $config = include APP_PATH . '/config/config.php';

	//read autoloader
    include APP_PATH . '/config/loader.php';

	//read di  services
    include APP_PATH . '/config/di.php';

	//handle the request
    $application = new Application();
    $application->setDI($di);
	
    echo $application->handle()->getContent();
	
} catch (Exception $e) {
    echo $e->getMessage();
}