<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces([
    'MyApp\Controllers' => $config->application->controllersDir,
    'MyApp\Models' => $config->application->modelsDir,
    'MyApp\Forms' => $config->application->formsDir
]);

$loader->register();