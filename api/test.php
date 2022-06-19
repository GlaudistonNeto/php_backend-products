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
  if (!emty($name) && !emty($price)) {
    if (!$par->registerProducts($name, $price, $width, $height, $length, $dvd,
        $book)) {
          echo "Email already registered!";
        }
  } else {
    echo "You need to fill the product name and its price...";
  }
}
?>
