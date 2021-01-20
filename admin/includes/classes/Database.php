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

        } catch (\PDOException $e) {
            die("Database Failed :: " . $e->getMessage());
        }

    }





}