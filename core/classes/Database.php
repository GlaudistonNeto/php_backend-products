<?php

namespace core\classes;

use PDO;
use PDOException;

class Database{

    private $connection;

    // ============================================================
    private function connect(){
        // connect to the database
        $this->connection = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // debug
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // ============================================================
    private function disconnect(){
        // disconnect from the database
        $this->connection = null;
    }

    // ============================================================
    // CRUD
    // ============================================================
    public function select($sql, $parameters = null){

        // execute SQL lookup function
        $this->connect();

        $results = null;

        // communicate
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
                $results = $execute->fetchAll(PDO::FETCH_CLASS);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
                $results = $execute->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from bd
        $this->disconnect();

        // return the results obtained
        return $results;
    }
}
