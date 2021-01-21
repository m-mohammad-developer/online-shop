<?php
namespace classes;

class Product extends Main
{
    protected static $class_name = "classes\Product";
    protected static $db_name = "products";
    protected static $auto_inc = "id";

    public $id;
    public $title;
    public $description;
    public $cat_id;
    public $price;
    public $photo;
    public $stock;
    public $created_at;


    /*********************** Methods *************************** */


}