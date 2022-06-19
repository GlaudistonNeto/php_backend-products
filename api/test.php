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
}
?>
