<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $connection;

    // ============================================================
    private function connect(){
        // connect to database
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
    public function select($sql, $parametros = null){

        // check if it's a SELECT statement
        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Database - Not a SELECT statement.');
        }

        // connect
        $this->connect();

        $results = null;

        // communicates
        try {
            
            // communication with the database
            if(!empty($parameters)){
                $run = $this->connection->prepare($sql);
                $run->execute($parameters);
                $results = $run->fetchAll(PDO::FETCH_CLASS);
            } else {
                $run = $this->connection->prepare($sql);
                $run->execute();
                $results = $run->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from db
        $this->disconnect();

        // returns the results obtained
        return $results;
    }

    // ============================================================
    public function insert($sql, $parameters = null){

        // check if it is an INSERT statement
        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception('Database - Not an INSERT statement.');
        }

        // connect
        $this->connect();

        // communicates
        try {
            
            // communication with the database
            if(!empty($parameters)){
                $run = $this->connection->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->connection->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from the database
        $this->disconnect();
    }

    // ============================================================
    public function update($sql, $parameters = null){

        // check if it is an UPDATE statement
        if(!preg_match("/^UPDATE/i", $sql)){
            throw new Exception('Database - Not an UPDATE statement.');
        }

        // connect
        $this->connect();

        // communicates
        try {
            
            // communication with the database
            if(!empty($parameters)){
                $run = $this->connection->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->connection->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from the database
        $this->disconnect();
    }

    // ============================================================
    public function delete($sql, $parameters = null){

        // check if it is an DELETE statement
        if(!preg_match("/^DELETE/i", $sql)){
            throw new Exception('Database - Not an DELETE statement.');
        }

        // connect
        $this->connect();

        // communicates
        try {
            
            // communication with the database
            if(!empty($parameters)){
                $run = $this->connection->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->connection->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from the database
        $this->disconnect();
    }

    // ============================================================
    // generic
    // ============================================================
    public function statement($sql, $parameters = null){

        // check if it is a DIFFERENT instruction
        if(preg_match("/^(SEÇECT|INSERT|UPDATE|DELETE)/i", $sql)){
            throw new Exception('Database - Invalid statement.');
        }

        // connect
        $this->connect();

        // communicates
        try {
            
            // communication with the database
            if(!empty($parameters)){
                $run = $this->connection->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->connection->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // disconnect from the database
        $this->disconnect();
    }

}
