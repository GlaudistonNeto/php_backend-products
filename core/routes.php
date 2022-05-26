<?php

// route collection
$routes = [
    'home' => 'main@index',
<<<<<<< HEAD
    'store' => 'main@store',
    'cart' => 'main@cart',
];

// define ação por defeito
$action = 'home';

// checks if the action exists in the query string
if(isset($_GET['a'])){

    // checks if the action exists in the routes
=======
    'store' => 'main@store'
];

// set default action
$action = 'home';

// checks if the action exists in the query string
if (isset($_GET['a'])) {

    // check if the action exists in the routes
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
    if(!key_exists($_GET['a'], $routes)){
        $action = 'home';
    } else {
        $action = $_GET['a'];
    }
}

<<<<<<< HEAD
// handles the route definition
=======
// handle the route definition
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
$parts = explode('@',$routes[$action]);
$controller = 'core\\controllers\\'.ucfirst($parts[0]);
$method = $parts[1];

$ctr = new $controller();
<<<<<<< HEAD
$ctr->$method();
=======
$ctr->$method();
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
