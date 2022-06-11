<?php
   // getting connection
   include 'connection.php';

   // receives typed data
    $id = $_POST['id'];

    // delete data on products table
    foreach($_POST['check_list'] as $id)
     {
        $receives_products = "DELETE from tb_products
                              WHERE id='$id'";
        $query_products = mysqli_query($conx, $receives_products);
     }

     // goes back to previous page
    header('Location: index.php');
?>
