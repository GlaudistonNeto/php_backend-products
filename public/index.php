<?php

use core\classes\Database;
use core\classes\Functions;

// open session
session_start();

// load the config
require_once('../config.php');

// load all project classes
require_once('../vendor/autoload.php');

$a = new Database();
$b = new Functions();

$b->teste();

echo 'OK';
/* 
load the config
load the class
load the route system
    - show store
    - show cart
    - show the backoffice, etc
*/