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
<?php
  if (isset($_GET['id_up'])) {
    $id_update = addslashes($_GET['id_up']);
    $res = $par->getPersonData($id_update);
  }
?>
    <td><a href="test.php?id_up=<?php echo $data[$i]['id'];?>">Edild</a>
        <a href="test.php?id=<?php echo $data[$i]['id'];?>">Delete</a>
    </td>
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



<?php
  if (isset($_GET['id'])) {
    $id_prod = addslashes($_GET['id']);
    $par->deleteProduct($id_prod);

    header("location: test.php");
  }
?>

<form method="POST">
<h1>REGISTER A PRODUCT</h1>
<label form="name">name</label>
<input type="text" name="name" value="<?php if(isset($res)) {echo $res['name'];}?>">
<label form="name">price</label>
<input type="text" name="price" value="<?php if(isset($res)) {echo $res['price'];}?>">
<label form="name">width</label>
<input type="text" name="width" value="<?php if(isset($res)) {echo $res['width'];}?>">
<label form="name">height</label>
<input type="text" name="height" value="<?php if(isset($res)) {echo $res['height'];}?>">
<label form="name">length</label>
<input type="text" name="length" value="<?php if(isset($res)) {echo $res['length'];}?>">
<label form="name">dvd</label>
<input type="text" name="dvd" value="<?php if(isset($res)) {echo $res['dvd'];}?>">
<label form="name">book</label>
<input type="text" name="book" value="<?php if(isset($res)) {echo $res['book'];}?>">

<input type="submit" value="<?php if (isset($res)){echo "UPDATE";} else {echo "REGISTER";}?>">
</form>
