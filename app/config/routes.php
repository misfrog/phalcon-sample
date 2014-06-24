<?php
/*
 * Define custom routes. File gets included in the router service definition.
*/
$router = new Phalcon\Mvc\Router();

// $router->setDefaultModule("frontend");
$router->setDefaultNamespace("Sample\Controllers");

$router->add( '/comments', array(
	'namespace' => 'Sample\Comments\Controllers' ,
	'module' => 'comments',
	'controller' => 'comments' ,
	'action' => 'index'
));

return $router;
