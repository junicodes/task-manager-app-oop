<?php
//this is a method from the roter class (it has an arrays of routes as its parameters)
session_start();


$router->get('', 'PageController@home');

$router->get('about', 'PageController@about');

$router->get('profile', 'PageController@profile');
$router->get('contact', 'PageController@contact');

$router->get('register', 'PageController@register');
$router->get('login', 'PageController@login');
$router->get('logout', 'PageController@logout');
$router->post('login', 'UserController@emitData');
$router->post('register', 'UserController@inputData');
$router->post('inserttask', 'TaskController@insertTasks');
$router->post('emmittask', 'TaskController@emmitTasks');
$router->post('confirm', 'TaskController@updateTask');
$router->post('delete', 'TaskController@deleteTask');

/*$router->define([

	'' => 'controllers/index.php',

	'about' => 'controllers/about.php',

	'culture' => 'controllers/about_culture.php',

	'contact' => 'controllers/contact.php',
	//from submit route
	'names' => 'controllers/add-name.php'//only for post types
]);

*/
?>