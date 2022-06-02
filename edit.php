<?php

// open connection
include 'connection.php';

// receives typed data
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];

// insert data on products table
$receives_products = "UPDATE tb_products
SET name = '$name', price '$price'
WHERE id = $id'";

// validates connection
$query_products = mysqli_query($connection, $receives_products);

// goes back to previous page
header('location: list.php');
?>
