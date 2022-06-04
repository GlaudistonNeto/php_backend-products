<?php

// open connection
include 'connection.php';

foreach ($_POST['checkbox'] as $checkbox) {}

// receives typed data
$id = $_POST['id'];

// delete data on products table
$receives_products = "DELETE FROM tb_products WHERE id='$id'";

// validates connection
$query_products = mysqli_query($connection, $receives_products);

// goes back to previous page
header('location: list.php');
?>
