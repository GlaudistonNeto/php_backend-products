<?php
include_once 'connection.php';

# $res = $conx->prepare("DELETE FROM tb_products WHERE id = :id");
# $id = 2;

# $res->bindValue(":id", $id);

# $res->execute();

# $res->bindParam();

$res = $conx->query("DELETE FROM tb_products WHERE id = '1'");
?>
