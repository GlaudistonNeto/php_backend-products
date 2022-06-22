<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include 'DbConnect.php';

$objDb = new DbConnect;
$conx = $objDb->connect();

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
  case "POST":
        $product = json_decode( file_get_contents('php://input') );
        $sql = "INSERT INTO tb_products(id, name, price, width, height, length,
                 dvd, book) VALUES(null, :name, :price, :width, :height,
                 :length, :dvd, :book)";
        $stmt = $conx->prepare($sql);
        $stmt->bindParam(':name', $product->name);
        $stmt->bindParam(':price', $product->price);
        $stmt->bindParam(':width', $product->width);
        $stmt->bindParam(':height', $product->height);
        $stmt->bindParam(':length', $product->length);
        $stmt->bindParam(':dvd', $product->dvd);
        $stmt->bindParam(':book', $product->book);
        

        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record created successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to create record.'];
        }
        echo json_encode($response);
        break;
  # 
}
?>
