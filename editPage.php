<?php
    include 'connection.php';

    $get_products = "SELECT * FROM tb_products ";
    $query_products = mysqli_query($conx, $get_products);
?>

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
      
    <!-- getting products to be shown on the html page -->
    <?php

        while($getting_products = mysqli_fetch_array($query_products)) {
            $name = $getting_products['name'];
            $price = '$: ' . $getting_products['price'];
            $width = $getting_products['width'];
            $height = $getting_products['height'];
            $length = $getting_products['length'];
            $dvd = $getting_products['dvd'];
            $book = $getting_products['book'];
        ?>
        <tr>
            <td scope="row"><?php echo $getting_products['id']; ?></td>
            <td><?php echo $name?></td>
            <td><?php echo $price?></td>
            <td><?php echo $width?></td>
            <td><?php echo $height?></td>
            <td><?php echo $length?></td>
            <td><?php echo $dvd?></td>
            <td><?php echo $book?></td>
            <td> <!-- EDITING values -->
                <form action="edit.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $getting_products['id']; ?>">
                    <input type="text" name="name" value="<?php echo $getting_products['name']; ?>">
                    <input type="text" name="price" value="<?php echo $getting_products['price']; ?>">
                    <input type="text" name="width" value="<?php echo $getting_products['width']; ?>">
                    <input type="text" name="height" value="<?php echo $getting_products['height']; ?>">
                    <input type="text" name="length" value="<?php echo $getting_products['length']; ?>">
                    <input type="text" name="dvd" value="<?php echo $getting_products['dvd']; ?>">
                    <input type="text" name="book" value="<?php echo $getting_products['book']; ?>">
                    <input type="submit" value="EDIT" class="btn btn-warning">
                </form>
            </td>

    <?php }; ?> <!-- closing while -->
    
    <!-- going back to list page -->
    <form action="index.php" method="POST">
        <button class="btn btn-success" type="submit">Back</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
