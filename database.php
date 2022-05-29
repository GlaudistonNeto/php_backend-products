<?php

class Database {
    public $db;
    public function getConnection() {
        $this->db = null;
        try{
            $this->db = new mysqli('localhost', 'root', 'admin', 'php_store');
        }catch(Exception $e) {
            echo "Database could not be connected: " . $e->getMessage();
        }
        return $this->db;
    }
}
?>
