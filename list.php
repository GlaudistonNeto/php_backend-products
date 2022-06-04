<?php
    include 'connection.php';

    $get_products = "SELECT * FROM tb_products ";
    $query_products = mysqli_query($connection, $get_products);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="wpriceth=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- getting products to be shown on the html page -->
    <table class="table">
        <thead>
            <tr>
                <th>SKU</th>
                <th>DELETE</th>
                <th>name</th>
                <th>price</th>
                <th>specifications</th>
            </tr>
        </thead>
        <tbody>
            <td></td>
            <td> <!-- DELETING values -->
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="submit" value="DELETE" class="btn btn-danger">
                </form>
            </td>
            <td></td>
            <td></td>
            <!-- creating while instructions -->
            <?php
                while($getting_products = mysqli_fetch_array($query_products)) {
                    $id = $getting_products['id'];
                    $name = $getting_products['name'];
                    $price = '$: ' . $getting_products['price'];
                    $attributes = $getting_products['attributes'];
            ?>
            <tr>
                <td scope="row"><?php echo $id?></td>
                <td>  <!-- DELETE CHECKBOX -->
                    <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                        <input  class="btn btn-danger"
                                name="checkbox[]"
                                type="checkbox"
                                value="<?php echo $id; ?>"
                        ><!-- not working -->
                    </form>
                </td>
                <td><?php echo $name?></td>
                <td><?php echo $price?></td>
                <td><?php echo $attributes?></td>
            </tr>

            <?php }; ?> <!-- closing while -->

            <!-- creating new values on the database -->
            <form action="create.php" method="POST">
                <td></td>
                <tr>
                    <th>name</th>
                    <th>price</th>
                    <th>attributes (Mb or Kg or HxWxL)</th>
                </tr>
                <td><input type="text" name="name"></td>
                <td><input type="real" name="price"></td>
                <td><input type="text" name="attributes"></td>
                <td><input class="btn btn-primary" type="submit" value="Add Product"></td>
            </form>            
        </tbody>
    </table>
    <!-- Sendint to edit page --> <!--  -->
    <div class="float-right">
        <form action="http://localhost/edit.php">
            <button class="btn btn-warning text-light"
                    onclick="edit.php" type="submit"
            >
            Go to EDIT page
        </button>
        </form>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
