<?php

/**
 * Router Class
 */
namespace App\Core;

class Router
{	


	public $routes = [

		'GET' => [],

		'POST' => []

	];


	public static function load($file)
	{
		
       $router = new static;


		require $file;

		return  $router;
	}

	public function get($uri, $controller)
	{
		$this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller)
	{
		$this->routes['POST'][$uri] = $controller;
	}

	public function direct($uri, $requestType)
	{

		if(array_key_exists($uri, $this->routes[$requestType])) {


			return $this->callAction(

				...explode('@', $this->routes[$requestType][$uri])

			);

		}

		throw new Exception("No routes defined for this URL.");
		
	}
	

	protected function callAction($class_controller, $class_method)
	{

		$class_controller = "App\\Controllers\\{$class_controller}";
		
		
		$class_controller = new $class_controller;
		
		if (! method_exists($class_controller, $class_method)) {
			throw new Exception(
				"No routes of this URl is defined"
			);
			
		}
		return $class_controller->$class_method();
	}
}

/*public function define($routes)
	{
		$this->routes = $routes;	
	}*/
