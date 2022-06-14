<?php
$user = "root";
$pass = "admin";

try {
    $conx = new PDO('mysql:host=localhost;dbname=php_store', $user, $pass);

    echo "Successfully connected";
} catch (PDOException $err) {
    // echo "Error: Unsuccessful Connection" . $err->getMessage();
}
?>