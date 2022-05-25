<?php

namespace core\classes;

use Exception;
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

        // verify if it is a select instruction
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception('Database is not a SELECT instruction.');
            // die('Database is not a SELECT instruction.');
        }

        // connect
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

    // ============================================================
    public function insert($sql, $parameters = null){

        // verify if it is a update instruction
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception('Database is not a UPDATE instruction.');
            // die('Database is not a SELECT instruction.');
        }

        // connect
        $this->connect();

        // communicate
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from bd
        $this->disconnect();
    }
    // ============================================================
    public function update($sql, $parameters = null){

        // verify if it is a update instruction
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception('Database is not a UPDATE instruction.');
            // die('Database is not a UPDATE instruction.');
        }

        // connect
        $this->connect();

        // communicate
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from bd
        $this->disconnect();
    }
    // ============================================================
    public function delete($sql, $parameters = null){

        // verify if it is a delete instruction
        if (!preg_match("/^DELETE/i", $sql)) {
            throw new Exception('Database is not a DELETE instruction.');
            // die('Database is not a DELETE instruction.');
        }

        // connect
        $this->connect();

        // communicate
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from bd
        $this->disconnect();
    }
    // ============================================================
    // generic
    // ============================================================
    public function statement($sql, $parameters = null){

        // verify if it is a different instruction
        if (preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)) {
            throw new Exception('Database is not a STATEMENT instruction.');
            // die('Database is a INVALID instruction.');
        }

        // connect
        $this->connect();

        // communicate
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from bd
        $this->disconnect();
    }
}
