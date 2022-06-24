<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include 'DbConnect.php';
$objDb = new DbConnect;
$conx = $objDb->connect();

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {
    # Getting data from the database
    case "GET":
        $sql = "SELECT * FROM tb_products";
        $path = explode('/', $_SERVER['REQUEST_URI']);
        if(isset($path[3]) && is_numeric($path[3])) {
            $sql .= " WHERE id = :id";
            $stmt = $conx->prepare($sql);
            $stmt->bindParam(':id', $path[3]);
            $stmt->execute();
            $products = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $conx->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode($products);
        break;
        # Creating new values into the database
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
        # Updating the values from the database
    case "PUT":
        $product = json_decode( file_get_contents('php://input') );
        $sql = "UPDATE FROM tb_products SET name = :name,
                                price = :price, width = :width, height = 
                                :height, length = :length, dvd = :dvd, book =
                                :book WHERE id = :id";
        $stmt = $conx->prepare($sql);
        $stmt->bindParam(':id', $product->id);
        $stmt->bindParam(':name', $product->name);
        $stmt->bindParam(':price', $product->price);
        $stmt->bindParam(':width', $product->width);
        $stmt->bindParam(':height', $product->$height);
        $stmt->bindParam(':length', $product->$length);
        $stmt->bindParam(':dvd', $product->$dvd);
        $stmt->bindParam(':book', $product->$book);

        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record updated successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to update record.'];
        }
        echo json_encode($response);
        break;
        # Deleting the values
    case "DELETE":
        $sql = "DELETE FROM tb_products WHERE id = :id";
        $path = explode('/', $_SERVER['REQUEST_URI']);

        $stmt = $conx->prepare($sql);
        $stmt->bindParam(':id', $path[3]);

        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record deleted successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to delete record.'];
        }
        echo json_encode($response);
}
