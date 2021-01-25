<?php

namespace classes;

class Order_detail extends Main
{
    protected static $class_name = "classes\Order_detail";

    protected static $db_name = "order_details";
    protected static $auto_inc = "id";

    public $id;
    public $order_id;
    public $product_id;
    public $is_confirmed; 
    public $product_quantity;



    public function setOrderDetails()
    {
        global $conn;
        
        $sql = "INSERT INTO order_details SET ";
        $sql .= "order_id = ?, product_id = ?, product_quantity = ?";

        return $conn->do($sql, [$this->order_id, $this->product_id, $this->product_quantity]);
    }


    

    /**
     * Confirm ORder Details
    */
    public static function confirmOrderDetails($order_id)
    {
        global $conn;
        $sql = "UPDATE order_details SET is_confirmed = ? WHERE order_id = ?"; 
        return $conn->do($sql, [1, $order_id]);
    }

    /**
     * Regect order
     */
    public static function regectOrderDetails($order_id)
    {
        global $conn;
        $sql = "UPDATE order_details SET is_confirmed = ? WHERE order_id = ?"; 
        return $conn->do($sql, [0, $order_id]);
    }

    /**
     * Delete Order_details
     * 
     */
    public static function deleteOrderDetails($order_id)
    {
        global $conn;
        $sql = "DELETE FROM order_details WHERE order_id = ?";
        return $conn->do($sql, [$order_id]);
    }

}