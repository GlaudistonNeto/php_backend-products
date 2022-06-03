<!doctype html>
<html lang="en">
  <head>
    <title>EDIT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php

  // getting connection
  include 'connection.php';
  
  // receives typed data
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];

  // insert data on products table
  $receives_products = "UPDATE tb_products
  SET name = '$name', price = '$price'
  WHERE id = '$id' ";

  // validates connection
  $query_products = mysqli_query($connection, $receives_products) or die(mysqli_error($connection));
  ?>

  <?php
      $get_products = "SELECT * FROM tb_products ";
      $query_products = mysqli_query($connection, $get_products);
  ?>
      
    <!-- getting products to be shown on the html page -->
    <?php

        while($getting_products = mysqli_fetch_array($query_products)) {
            $id = $getting_products['id'];
            $name = $getting_products['name'];
            $price = $getting_products['price'];
        ?>
        <tr>
            <td scope="row"><?php echo $id?></td>
            <td><?php echo $name?></td>
            <td><?php echo $price?></td>
            <td> <!-- EDITING values -->
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $getting_products['id']; ?>">

                    <input type="text" name="name" value="<?php echo $getting_products['name'];?>">
                    <input type="text" name="price" value="<?php echo $getting_products['price'];?>">
                    <input type="submit" value="EDIT" class="btn btn-warning">
                </form>
            </td>

    <?php }; ?> <!-- closing while -->

    <form action="http://localhost/list.php">
        <button class="btn btn-success" onclick="list.php" type="submit">Back</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>