<?php


use App\Core\App; 


App::bind('config', require 'config.php');

$config = App::get('config');


$pdo = Connection::make($config['database']);


App::bind('database', new QueryBuilder($pdo));




function view($view_name, $data=[]) 

{

	extract($data);

	return require "app/views/{$view_name}.view.php";
}


function userView($path) 

{
	header("Location: /{$path}");

}



// //get the hidden connection details
// $app = [];

// $app['config'] = require("config.php");

//Use the database connection from the fuction



























//require task.php
//require("task.php");

// //require the router for the page
// require("core/Router.php");

// //require the router for the page
// require("core/Request.php");

// ///Connect to db
// require("core/database/Connection.php");

// //require Query builder Class
// require("core/database/QueryBuilder.php");
