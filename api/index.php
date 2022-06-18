<?php
include_once 'connection.php';

$res = $conx->prepare("SELECT * FROM tb_products WHERE id = :id");
$res->bindValue(":id", 4);
$res->execute();
$result = $res->fetch(PDO::FETCH_ASSOC);

# OR, for many lines
# $result = $conx->fetchALL();
foreach ($result as $key => $item) {
  echo $key.": ".$item."<br/>";
}
?>