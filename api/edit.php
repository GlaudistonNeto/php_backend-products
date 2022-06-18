<?php
include_once 'connection.php';

# $res = $conx->prepare("UPDATE FROM tb_products SET price :price WHERE id = :id");
# $id = 2;

# $res->bindValue(":price", 0.03);
# $res->bindValue(":id", 4);

# $res->execute();

# $res->bindParam();

$res = $conx->query("UPDATE tb_products SET price = 0.05 WHERE id = '4'");
?>
