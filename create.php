<?php
    include 'connection.php';

    $name = $_POST['name'];
    $price = $_POST['price'];
    $width = (int)$_POST['width'] ?? 0;
    $height =(int) $_POST['height'] ?? 0;
    $length = (int)$_POST['length'] ?? 0;
    $dvd = (int)$_POST['dvd'] ?? 0;
    $book = (double)$_POST['book'] ?? 0.0;

    $getting_products = "INSERT INTO
    tb_products (name, price, width, height, length, dvd, book) 
    VALUES ('$name', '$price', '$width', '$height', '$length', '$dvd', '$book')";
    if (mysqli_query($conx, $getting_products)) header('location: index.php');
?>
