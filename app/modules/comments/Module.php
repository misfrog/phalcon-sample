<?php
namespace Sample\Comments;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

class Module implements ModuleDefinitionInterface
{
	/**
	 * Registers the module auto-loader
	 */
	public function registerAutoloaders()
	{
		$loader = new Loader();
		$loader->registerNamespaces(array(
			'Sample\Comments\Controllers' => __DIR__ . '/controllers/',
			'Sample\Comments\Models' => __DIR__ . '/models/'
		));
		$loader->register();
	}

	/**
	 * Registers the module-only services
	 *
	 * @param Phalcon\DI $di
	 */
	public function registerServices($di)
	{
		/**
		 * Read configuration
		 */
		$config = include __DIR__ . "/../../config/config.php";
		
		/**
		 * Setting up the view component
		 */
		$di->set('view', function() {
			$view = new View();
			$view->setViewsDir(__DIR__ . '/views/');
			$view->registerEngines(array(
				'.volt' => function ($view, $di) {
					
				$volt = new VoltEngine($view, $di);
					
				$volt->setOptions(array(
					'compiledPath' => __DIR__ . '/../../cache/',
					'compiledSeparator' => '_'
				));
					
				return $volt;
			},
			'.phtml' => 'Phalcon\Mvc\View\Engine\Php'
			));

			return $view;
		});
		
		$di->set('db', function () use ($config) {
			return new DbAdapter(array(
				'host' => $config->database->host,
				'username' => $config->database->username,
				'password' => $config->database->password,
				'dbname' => $config->database->dbname
			));
		});
	}
}
