<?php

namespace classes;

use PDOException;

class Deleted_order extends Main
{
    protected static $class_name = "classes\Deleted_order";

    protected static $db_name = "deleted_orders";
    protected static $auto_inc = "id";

    public $id;
    public $user_id;
    public $total_price;
    public $track_code;
    public $created_at;
    
    public function saveInDeleted($order)
    {
        global $conn;
        $this->user_id      = $order->user_id;
        $this->total_price  = $order->total_price;
        $this->track_code   = $order->track_code;
        $sql = "INSERT INTO deleted_orders SET user_id = ?, total_price = ?, track_code = ?";
        return $conn->do($sql, [$this->user_id, $this->total_price, $this->track_code]);
    }
    
}