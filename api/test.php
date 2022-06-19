<?php
require_once 'productsClass.php';

$par = new Product("localhost", "php_store", "root", "");

$data = $par->getData();

if (count ($data) > 0) {
  for ($i=0; $i < count ($data); $i++) {
    echo '<tr>';
    foreach ($data[$i] as $key => $item) {
      if ($key != 'id') {
        echo "<td>".$item."</td>";
      }
    }
  ?>
    <td><a href="#">Edild</a><a href="#">Delete</a></td>
  <?php
  echo '</tr>';
  }
} else { # if the database is empt
  echo "There's nothing in this store...";
}

if (isset($_POST['name'])) {
  $name = addslashes($_POST['name']);
  $price = addslashes($_POST['price']);
  $width = addslashes($_POST['width']);
  $height = addslashes($_POST['height']);
  $length = addslashes($_POST['length']);
  $dvd = addslashes($_POST['dvd']);
  $book = addslashes($_POST['book']);
  if (!empty($name) && !empty($price)) {
    if (!$par->registerProducts($name, $price, $width, $height, $length, $dvd,
        $book)) {
          echo "Email already registered!";
        }
  } else {
    echo "You need to fill the product name and its price...";
  }
}
?>

<form method="POST">
<h1>REGISTER A PRODUCT</h1>
<label form="name">name</label>
<input type="text" name="name">
<label form="name">price</label>
<input type="text" name="price">
<label form="name">width</label>
<input type="text" name="width">
<label form="name">height</label>
<input type="text" name="height">
<label form="name">length</label>
<input type="text" name="length">
<label form="name">dvd</label>
<input type="text" name="dvd">
<label form="name">book</label>
<input type="text" name="book">

<input type="submit" value="REGISTER">
</form>
