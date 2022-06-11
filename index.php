<?php
    include 'connection.php';

    $find_products = "SELECT * FROM tb_products ";
    $query_products = mysqli_query($conx, $find_products);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>For Scadiweb</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th> <!-- DELETING values -->
                    <button type="submit" form="del-form" class="btn btn-danger">
                        DELETE
                    </button>
                </th>
                <th>name</th>
                <th>price</th>
                <th>width</th>
                <th>height</th>
                <th>length</th>
                <th>dvd</th>
                <th>book</th>
            </tr>
        </thead>
        <thead>
            <form action="delete.php" id="del-form" method="post"> 
        </thead>
        <tbody>
            <?php
            while ($getting_products = mysqli_fetch_array($query_products)) {
                $id = $getting_products['id'];
                $name = $getting_products['name'];
                $price = $getting_products['price'];
                $width = $getting_products['width'];
                $height = $getting_products['height'];
                $length = $getting_products['length'];
                $dvd = $getting_products['dvd'];
                $book = $getting_products['book'];
            ?>


            <tr>
                <td scope="row"><?php echo $id; ?></td>
                <td>  <!-- DELETE CHECKBOX -->
                    <form action="delete.php" method="POST">
                    <input
                            type="checkbox"
                            name="check_list[]"
                            value="<?php echo $id?>"
                    >
                </td>
                <td><?php echo $name; ?></td>
                <td>$: <?php echo $price; ?></td>
                <td><?php echo $width; ?> cm</td>
                <td><?php echo $height; ?> cm</td>
                <td><?php echo $length; ?> cm</td>
                <td><?php echo $dvd; ?> MB</td>
                <td><?php echo $book; ?>Kg</td>
            </tr>
            <?php }; ?> <!-- closing while statement -->
            </form>
            <tr>
                <form action="create.php" method="post">
                    <td>
                        <p class="position-absolute text-primary text-uppercase float-left">
                            Add a product
                        </p>
                    </td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="name" placeholder="name"></td>
                    <td><input type="text" name="price" placeholder="price ($)"></td>
                    <td><input type="text" name="width" placeholder="width (cm)"></td>
                    <td><input type="text" name="height" placeholder="name (cm)"></td>
                    <td><input type="text" name="length" placeholder="height (cm)"></td>
                    <td><input type="text" name="dvd" placeholder="dvd (MB)"></td>
                    <td><input type="text" name="book" placeholder="book (Kg)"></td>
                    <td><input class="btn btn-success" type="submit" value="ADD"></td>
                </form>
            <!-- Sendint to edit page -->
                <div class="float-right">
                <form action="editPage.php" method="POST">
                    <button class="btn btn-warning text-light" type="submit">
                    Go to EDIT page
                </button>
                </form>
            </tr>
        </tbody>
      </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf
