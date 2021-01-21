<?php
namespace classes;

class Main
{
    protected static $class_name = "classes\Main";
    protected static $db_name = "aa";
    protected static $auto_inc = "id";

    // properties of class (in database)


    /*********************** Methods *************************** */

    /**
     * Find All Rows in Database belongs to this class
     */
    public static function findAll()
    {
        return static::findAllQuery("Select * from ". static::$db_name, [], static::$class_name);
    }

    /**
     * Find the row from Database By Id
     */
    public static function findById($id)
    {
        return static::findQuery("Select * from " . static::$db_name . " where ". static::$auto_inc ." = ?", [$id], static::$class_name);
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

        $sql = "INSERT INTO ". static::$db_name ." ( ". implode(",", array_keys($properties)) ." )";
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
        $sql = "UPDATE ". static::$db_name ." set " . implode(", ", $array) . " where ". static::$auto_inc ." = ". $this->id;

        
        return $conn->do($sql, static::propertiesValue($this));
    }


    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }


    public function delete()
    {
        global $conn;
        // DELETE FROM `categories` WHERE 0
        $sql = "DELETE FROM ". static::$db_name . " where ". static::$auto_inc ." = ". $this->id;
        
        return $conn->do($sql);
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