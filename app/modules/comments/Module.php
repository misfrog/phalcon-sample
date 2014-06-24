<?php
namespace Sample\Comments;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

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
	}
}
