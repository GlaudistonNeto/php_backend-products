<?php

class Products {
    //dbaction
    private $db;

    // Table
    private $db_table = "products";

    //columns
    public $id;
    public $name;
    public $price;
    public $created;
    public $result;

    // DB dbaction
    public function __construct($db) {
        $this->db = $db;
    }

    // GET All
    public function getProducts() {
        $sqlQuery = "SELECT id, name, price, created from " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createProducts(){
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->name));
        $this->created=htmlspecialchars(strip_tags($this->name));
        $sqlQuery = "INSERT INTO
        ". $this->db_table ." SET name = '".$this->name."',
        price = '".$this->price."',
        created = '".$this->created."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // UPDATE
    public function getSingleProduct(){
        $sqlQuery = "SELECT id, name, price, created FROM
        ". $this->db_table ." WHERE id = ".$this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->name = $dataRow['name'];
        $this->price = $dataRow['price'];
        $this->created = $dataRow['created'];
    }

    // UPDATE
    public function updateProduct(){
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->created=htmlspecialchars(strip_tags($this->created));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
        price = '".$this->price."',
        created = '".$this->created."'
        WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    function deleteProduct(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>
