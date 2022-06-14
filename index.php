<?php
header("Access-Control-Allow-Origin *");
header("Content-type: application/json; charset=UTF-8");

// including database
include_once "connection.php";

$query_products = "SELECT * FROM tb_products
                    ORDER BY id DESC";

$result_products = $conx->prepare($query_products);
$result_products->execute();

if(($result_products) and ($result_products->rowCount() != 0)) {
    while($row_product = $result_products->fetch(PDO::FETCH_ASSOC)) {
        extract($row_product);

        $products_list["records"][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'width' => $width,
            'height' => $height,
            'length' => $length,
            'dvd' => $dvd,
            'book' => $book,
        ];
    }
    // response with a 200 status

    http_response_code(200);

    // returning products as json format
    echo json_encode($products_list);
}
?>