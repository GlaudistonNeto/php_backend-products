<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

<<<<<<< HEAD
    private $link;
=======
    private $connection;
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09

    // ============================================================
    private function connect(){
        // connect to the database
<<<<<<< HEAD
        $this->link = new PDO(
=======
        $this->connection = new PDO(
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // debug
<<<<<<< HEAD
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
=======
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
    }

    // ============================================================
    private function disconnect(){
        // disconnect from the database
<<<<<<< HEAD
        $this->link = null;
=======
        $this->connection = null;
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
    }

    // ============================================================
    // CRUD
    // ============================================================
    public function select($sql, $parameters = null){

<<<<<<< HEAD
        // checks if it is a SELECT statement
        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Database - Not a SELECT statement.');
        }

        // link
=======
        // verify if it is a select instruction
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception('Database is not a SELECT instruction.');
            // die('Database is not a SELECT instruction.');
        }

        // connect
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
        $this->connect();

        $results = null;

<<<<<<< HEAD
        // communicates
=======
        // communicate
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
        try {
            
            // communication with the db
            if(!empty($parameters)){
<<<<<<< HEAD
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
                $results = $run->fetchAll(PDO::FETCH_CLASS);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
                $results = $run->fetchAll(PDO::FETCH_CLASS);
=======
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
                $results = $execute->fetchAll(PDO::FETCH_CLASS);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
                $results = $execute->fetchAll(PDO::FETCH_CLASS);
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

<<<<<<< HEAD
        // turn off the bd
        $this->disconnect();

        // returns the results obtained
=======
        // disconnect from bd
        $this->disconnect();

        // return the results obtained
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
        return $results;
    }

    // ============================================================
    public function insert($sql, $parameters = null){

<<<<<<< HEAD
        // checks if it is an INSERT statement
        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception('Database - Not an INSERT statement.');
        }

        // link
        $this->connect();

        // communicates
=======
        // verify if it is a update instruction
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception('Database is not a UPDATE instruction.');
            // die('Database is not a SELECT instruction.');
        }

        // connect
        $this->connect();

        // communicate
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
        try {
            
            // communication with the db
            if(!empty($parameters)){
<<<<<<< HEAD
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
=======
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

<<<<<<< HEAD
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
=======
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
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
        try {
            
            // communication with the db
            if(!empty($parameters)){
<<<<<<< HEAD
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
=======
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

<<<<<<< HEAD
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
=======
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
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
        try {
            
            // communication with the db
            if(!empty($parameters)){
<<<<<<< HEAD
                $run = $this->call->prepare($sql);
                $run->execute($parameters);
            } else {
                $run = $this->call->prepare($sql);
                $run->execute();
=======
                $execute = $this->connection->prepare($sql);
                $execute->execute($parameters);
            } else {
                $execute = $this->connection->prepare($sql);
                $execute->execute();
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
            }
        } catch (PDOException $e) {
            
            // if there is an error
            return false;
        }

<<<<<<< HEAD
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
=======
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
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
