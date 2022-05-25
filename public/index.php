<?php

// abrir a sessao
session_start();

use core\classes\Database;

// load the config
require_once('../config.php');

// load all project classes
require_once('../vendor/autoload.php');

$bd = new Database();
$clients = $bd->select("SELECT * FROM clients");
echo '<pre>';
print_r($clients);
