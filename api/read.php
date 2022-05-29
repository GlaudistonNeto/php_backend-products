<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../products.php';
$database = new Database();

$db = $database->getConnection();
$items = new Products($db);
$records = $items->getProducts();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount > 0){
    $productArr = array();
    $productArr["body"] = array();
    $productArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc())
{
array_push($productArr["body"], $row);
}
echo json_encode($productArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>
    