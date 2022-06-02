<?php

// open connection
include 'connection.php';

// receives typed data
$name = $_POST['name'];
$price = $_POST['price'];

// insert data on products table
$receives_products = "INSERT INTO
tb_products
VALUES (null, '$name', '$price')";

// validates connection
$query_products = mysqli_query($connection, $receives_products);

// goes back to previous page
header('location: list.php');
?>
