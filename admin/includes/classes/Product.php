<?php

namespace classes;

class Product
{
    protected static $db_name = "products";
    protected static $auto_inc = "id";
    protected static $db_columns = ['id', 'title', 'description', 'price', 'photo', 'stock', 'created_at'];
    // protected static $auto_inc = "id";

    public $id, $title, $description, $price, $photo, $stock, $created_at;


    /*********************** Methods *************************** */

    /**
     * Find All Rows in Database belongs to this class
     */
    public static function findAll()
    {
        return static::findAllQuery("Select * from ". static::$db_name, [], __CLASS__);
    }

    /**
     * Find the row from Database By Id
     */
    public static function findById($id)
    {
        return static::findQuery("Select * from " . static::$db_name . " where ". static::$auto_inc ." = ?", [$id], __CLASS__);
    }

    /**
     * DB Connectors
     */
    public static function findAllQuery(string $sql, array $values = [], $class)
    {
        global $conn;
        return $conn->selectAll($sql, $values, $class);
    }

    public static function findQuery(string $sql, array $values = [], $class)
    {
        global $conn;
        return $conn->select($sql, $values, $class);
    }
    /** **** */


    public function create()
    {
        global $conn;
        $properties = static::properties($this);

        $sql = "INSERT INTO products ( ". implode(",", array_keys($properties)) ." )";
        $sql .= " VALUES (". implode(",", array_values($properties)) .")";
        
        return $conn->do($sql, static::propertiesValue($this));
    }


    public function update()
    {
        global $conn;
        $properties = static::properties($this);

        // array of property's Keys and ? ;; like property => ?
        $array = [];
        foreach($properties as $key => $value) {
            $array[] = $key . " = " . $value;
        }
        $sql = "UPDATE products set " . implode(", ", $array) . " where id = ". $this->id;

        return $conn->do($sql, static::propertiesValue($this));
    }


    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }




    /**
     * Helper Methods
     */


     /**
     * [
     *  prop1 => value1
     *  prop2 => value2
     * ]
     */ 
    public static function properties($object)
    {
        $properties = get_object_vars($object);

        $prop_db = [];
        foreach ($properties as $key => $value) {
            if($key == 'id' || $key == 'created_at') continue;
            $prop_db[$key] = "?";
        }
        return $prop_db;

    }
    
    public static function propertiesValue($object) 
    {
        $properties = get_object_vars($object);

        $prop_db = [];
        foreach ($properties as $key => $value) {
            if($key == 'id' || $key == 'created_at') continue;
            $prop_db[] = $value;
        }
        return $prop_db;
    }


}