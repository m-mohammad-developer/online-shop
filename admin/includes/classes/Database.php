<?php

namespace classes;

use PDO;

class Database
{
    private $host, $user, $pass, $name, $options;
    
    public $conn;

    function __construct()
    {
        $this->host = DB_INFO['host'];
        $this->user = DB_INFO['user'];
        $this->pass = DB_INFO['pass'];
        $this->name = DB_INFO['name'];

        $this->options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->name;charset=utf8", $this->user, $this->pass, $this->options);
            // $this->conn->setAttribute(ATTR_F)
        } catch (\PDOException $e) {
            die("Database Failed :: " . $e->getMessage());
        }

    }



    /***
     * Selec All
     */
    public function selectAll(string $sql, array $values = [], string $class) 
    {
        // preapre sql statement
        $stmt = $this->conn->prepare($sql);

        // bind values
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        // execute query
        if (!$stmt->execute())
            return false;
        // retreave data from database
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);

    }

    /***
     * Select one item
     */
    public function select(string $sql, array $values = [], string $class) 
    {
        // preapre sql statement
        $stmt = $this->conn->prepare($sql);

        // bind values
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        // execute query
        if (!$stmt->execute())
            return false;

        // Set Fetch Style
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        // retreave data from database
        return $stmt->fetch();
    }

    /**
     * Create/Update Data
     * 
     */
    public function do(string $sql, array $values = []) 
    {
        // preapre sql statement
        $stmt = $this->conn->prepare($sql);

        // bind values
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        // execute query
        return $stmt->execute();
        // return true or false
        // return $stmt->rowCount();
    }

 



}