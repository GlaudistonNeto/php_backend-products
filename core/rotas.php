<?php

// collection of routes
$routes = [
    'home' => 'main@index',
    'store' => 'main@store',
    'addProd' => 'store@addProd'
];

// define default action
$action = 'home';

// check if the action exists in the query string
if(isset($_GET['a'])){

    // check if the action exists in the routes
    if(!key_exists($_GET['a'], $routes)){
        $action = 'home';
    } else {
        $action = $_GET['a'];
    }
}

// handle the route definition
$parts = explode('@',$routes[$action]);
$controller = 'core\\controllers\\'.ucfirst($parts[0]);
$method = $parts[1];

$ctr = new $controller();
$ctr->$method();