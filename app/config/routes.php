<?php
/*
 * Define custom routes. File gets included in the router service definition.
*/
$router = new Phalcon\Mvc\Router();

$router->setDefaultNamespace("Sample\Controllers");

$router->add( '/comments', array(
	'namespace' => 'Sample\Comments\Controllers' ,
	'module' => 'comments',
	'controller' => 'comments' ,
	'action' => 'index'
));

$router->add( '/comments/', array(
	'namespace' => 'Sample\Comments\Controllers' ,
	'module' => 'comments',
	'controller' => 'comments' ,
	'action' => 'index'
));


$router->add( '/comments/:controller', array (
	'namespace' => 'Sample\Comments\Controllers' ,
	'module' => 'comments',
	'controller' => 1,
	'action' => 'index',
));


$router->add( '/comments/:controller/', array (
	'namespace' => 'Sample\Comments\Controllers' ,
	'module' => 'comments',
	'controller' => 1,
	'action' => 'index',
));


$router->add( '/comments/:controller/:action', array (
	'namespace' => 'Sample\Comments\Controllers' ,
	'module' => 'comments',
	'controller' => 1,
	'action' => 2,
));

$router->add( '/comments/:controller/:action/', array (
	'namespace' => 'Sample\Comments\Controllers' ,
	'module' => 'comments',
	'controller' => 1,
	'action' => 2,
));

$router->add('/comments/:controller/:action/:params',array(
	'namespace' => 'Sample\Comments\Controllers',
	'module' => 'comments',
	'controller' => 1,
	'action' => 2,
	'params' => 3,
));

return $router;
