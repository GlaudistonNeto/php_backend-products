<?php
$db_host = 'localhost';
$db_user = 'root';
$password = 'admin';
$db_name = 'php_store';

$conx = mysqli_connect($db_host, $db_user, $password, $db_name);

// connection test
// if ($conx) {
//     echo 'CONNECTED';
// } else {
//     echo 'ERROR';
// }
?>
