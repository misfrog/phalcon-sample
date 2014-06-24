<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
/*
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir
    )
)->register();
*/

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(array(
    'Sample\Models' => $config->application->modelsDir,
    'Sample\Controllers' => $config->application->controllersDir,
    'Sample\Comments\Models' => __DIR__ . '/../../app/modules/comments/controllers/',
    'Sample\Comments\Controllers' => __DIR__ . '/../../app/modules/comments/models/'
));


$loader->register();

// Use composer autoloader to load vendor classes
require_once __DIR__ . '/../../vendor/autoload.php';
