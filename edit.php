<?php
// getting connection
include 'connection.php';

// receives typed data
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$width = $_POST['width'];
$height = $_POST['height'];
$length = $_POST['length'];
$dvd = $_POST['dvd'];
$book = $_POST['book'];

// insert data on products table
$receives_products = "UPDATE tb_products
SET name = '$name', price = '$price', width = $width, height = $height,
    length = $length, dvd = $dvd, book = $book
WHERE id = '$id' ";

// validates connection
$query_products = mysqli_query($conx, $receives_products) or die(mysqli_error($conx));
?>

<?php
    $get_products = "SELECT * FROM tb_products ";
    $query_products = mysqli_query($conx, $get_products);

    // goes back to previous page
    header('location: index.php');
?>
