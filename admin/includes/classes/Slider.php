<?php
namespace classes;

class Slider extends Main
{
    protected static $class_name = "classes\Slider";

    protected static $db_name = "slider";
    protected static $auto_inc = "id";

    public $id, $path;

    /*********************** Methods *************************** */


    public function create()
    {
        global $conn;
        $sql = "INSERT INTO slider SET path = ?";
        return $conn->do($sql, [$this->path]);
    }

}