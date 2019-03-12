<?php

//get the return value from bootstrap from the core
require("vendor/autoload.php");

require("core/bootstrap.php");

//instatiate the Router Class
//$router = new Router;
use App\Core\{Router, Request};
//here we call the routes array into the router class
//require "routes.php";

//declare the redirect method from the Router Class to direct the trafic
//this requires any routes and serves the link to the defined page


$uri = Request::uri();//Coming from the Requst class
$method = Request::method();
//use a static methodd fom the router class
//chaining process happenin here

Router::load('app/routes.php')

   ->direct($uri, $method);


?>