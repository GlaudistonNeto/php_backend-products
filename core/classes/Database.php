<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $link;

    // ============================================================
    private function connect(){
        // connect to the database
        $this->link = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // debug
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // ============================================================
    private function disconnect(){
        // disconnect from the database
        $this->link = null;
    }

    // ============================================================
    // CRUD
    // ============================================================
    public function select($sql, $parameters = null){

        // checks if it is a SELECT statement
        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Database - Not a SELECT statement.');
        }

        // link
        $this->connect();

        $results = null;

        // communicates
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
                $results = $run->fetchAll(PDO::FETCH_CLASS);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
                $results = $run->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // turn off the bd
        $this->disconnect();

        // returns the results obtained
        return $results;
    }

    // ============================================================
    public function insert($sql, $parameters = null){

        // checks if it is an INSERT statement
        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception('Database - Not an INSERT statement.');
        }

        // link
        $this->connect();

        // communicates
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // turn off the bd
        $this->disconnect();
    }

    // ============================================================
    public function update($sql, $parameters = null){

        // checks if it is an UPDATE statement
        if(!preg_match("/^UPDATE/i", $sql)){
            throw new Exception('Database - Not an UPDATE statement.');
        }

        // link
        $this->connect();

        // comunicates
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // turn off the bd
        $this->disconnect();
    }

    // ============================================================
    public function delete($sql, $parameters = null){

        // checks if it is a DELETE statement
        if(!preg_match("/^DELETE/i", $sql)){
            throw new Exception('Database - Not an DELETE statement.');
        }

        // link
        $this->connect();

        // communicates
        try {
            
            // communication with the db
            if(!empty($parameters)){
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

        // if there is an error
        $this->disconnect();
    }


    // ============================================================
    // GENÉRICA
    // ============================================================
    public function statement($sql, $parameters = null){

        // verifica se é uma instrução diferente das anteriores
        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)){
            throw new Exception('Database - Invalid instruction.');
        }

        // liga
        $this->connect();

        // comunica
        try {
            
            // comunicação com a bd
            if(!empty($parameters)){
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
            }
        } catch (PDOException $e) {
            
            // caso exista erro
            return false;
        }

        // desliga da bd
        $this->disconnect();
    }
}