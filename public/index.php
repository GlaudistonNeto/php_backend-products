<?php

// open the session

use core\classes\Database;

session_start();

// load the config
require_once('../config.php');

// load all project classes
require_once('../vendor/autoload.php');

// load the route system
require_once('../core/routes.php');
