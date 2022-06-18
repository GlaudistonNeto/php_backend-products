<?php
include_once 'connection.php';

# $res = $conx->prepare("INSERT INTO tb_products (name, price, width, height, length,
#               dvd, book) VALUES (:name, :price, :width, :height, length, :dvd,
#               :book)");

# $res->bindValue(":name","prod_one");
# $res->bindValue(":price",0.01);
# $res->bindValue(":width",200);
# $res->bindValue(":height",20);
# $res->bindValue(":length",15);
# $res->bindValue(":dvd",4806);
# $res->bindValue(":book",0.35);

# $res->execute();

# $res->bindParam();

$conx->query("INSERT INTO tb_products(name, price, width, height, length,
              dvd, book)
              VALUES('prod_one', 0.01, 40, 20, 15,
                      4608, 0.25)");
?>
