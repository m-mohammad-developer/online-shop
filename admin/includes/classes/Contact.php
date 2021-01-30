<?php
namespace classes;

class Contact extends Main
{
    protected static $class_name = "classes\Contact";

    protected static $db_name = "contact_us";
    protected static $auto_inc = "id";

    public $id, $name, $email, $text, $created_at;

    /*********************** Methods *************************** */


    public function create()
    {
        global $conn;
        $sql = "INSERT INTO " . static::$db_name . " SET name = ?, email = ?, text = ?";
        return $conn->do($sql, [$this->name, $this->email, $this->text]);
    }

}