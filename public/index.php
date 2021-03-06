<?php

error_reporting(E_ALL);

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";
    
	/**
	 * Compile application.less
	 */
	$less = new lessc;
	$less->checkedCompile('less/application.less', 'css/application.css');
    
    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    /**
     * Include modules
     */
    require __DIR__ . '/../app/config/modules.php';

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}
