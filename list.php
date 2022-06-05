<?php
    include 'connection.php';

    $get_products = "SELECT * FROM tb_products ";
    $query_products = mysqli_query($connection, $get_products);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Products</title>
    <script src="jquery-2.1.4.min.js"></script>
    <script src="javascript.js"></script>
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
                <th> <!-- DELETING values -->
                    <button type="submit" form="del-form" class="btn btn-danger">
                        DELETE
                    </button>
                </th>
                <th>name</th>
                <th>price</th>
                <th>dvd MB</th>
                <tr>
                    <td></td>                    
                    <td></td>                    
                    <td></td>                    
                    <td></td>                    
                    <th>book Kg</th>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>dimension height</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>dimension width</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>dimension lenght</th>
                    </tr>
                </tr>
            </tr>
        </thead>
        <thead>
            <form action="delete.php" id="del-form" method="post"> 
        </thead>
        <tbody>
            <!-- creating while instructions -->
            <?php
                while($getting_products = mysqli_fetch_array($query_products)) {
                    $id = $getting_products['id'];
                    $name = $getting_products['name'];
                    $price = '$: ' . $getting_products['price'];
                    $dvd = $getting_products['dvd'];
                    $book = $getting_products['book'];
                    $height = $getting_products['height'];
                    $width = $getting_products['width'];
                    $length = $getting_products['length'];
            ?>
            <tr>
                <td scope="row"><?php echo $id?></td>
                <td>  <!-- DELETE CHECKBOX -->
                <form action="delete.php" method="POST">
                <input
                        type="checkbox"
                        name="check_list[]"
                        value="<?php echo $id?>"
                >
                </td>
                <td><?php echo $name?></td>
                <td><?php echo $price?></td>
                <td><?php echo $dvd?></td>
                <td><?php echo $book?></td>
                <td><?php echo $height?></td>
                <td><?php echo $width?></td>
                <td><?php echo $length?></td>
            </tr>

            <?php }; ?> <!-- closing while -->

            <!-- creating new values on the database -->
            <form action="create.php" method="POST">
                <td></td>
                <tr>
                    <th>name</th>
                    <th>price</th>
                    <th>type</th>
                    <tr>
                    <td><input type="text" name="name"></td>
                    <td><input type="real" name="price"></td>
                        <td>DVD</td>                                       
                        <td><input type="text" name="dvd" placeholder="MB"></td>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Book</td>
                            <td><input type="text" name="book" placeholder="Kg"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Dimentional product</td>                                                                   
                            <td><input type="text" name="height" placeholder="height"></td>
                            <td><input type="text" name="width" placeholder="width"></td>
                            <td><input type="text" name="lenght" placeholder="lenght"></td>
                        </tr>
                    </tr>                    
                </tr>
                <td><input class="btn btn-primary" type="submit" value="Add Product"></td>
            </form>            
        </tbody>
    </table>
    <!-- Sendint to edit page --> <!--  -->
    <div class="float-right">
        <form action="editPage.php" method="POST">
            <button class="btn btn-warning text-light" type="submit">
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
