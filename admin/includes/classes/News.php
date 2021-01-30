<?php
namespace classes;

class News extends Main
{
    protected static $class_name = "classes\News";

    protected static $db_name = "news";
    protected static $auto_inc = "id";

    public $id, $text, $created_at;

    /*********************** Methods *************************** */


    public function create()
    {
        global $conn;
        $sql = "INSERT INTO news SET text = ?";
        return $conn->do($sql, [$this->text]);
    }

}