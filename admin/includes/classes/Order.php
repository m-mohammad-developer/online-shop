<?php

namespace classes;

class Order extends Main
{
    protected static $class_name = "classes\Order";

    protected static $db_name = "orders";
    protected static $auto_inc = "id";

    public $id;
    public $user_id;
    // public $detail_id;
    public $total_price;
    public $track_code; 
    public $is_confirmed; 
    public $created_at;
    
    
    

    /**
     * 
     * products = [
     *  [product_id => product_count],
     *  [product_id2 => product_count2]
     * ]
     * 
     */
    public function makeOrder(array $products)
    {
        global $conn;
        // sql of order
        $sql  = "INSERT INTO orders set ";
        $sql .= "user_id     = ?, ";
        $sql .= "total_price = ?, ";
        $sql .= "track_code  = ? ";
    
        try {
            /* Begin a transaction, turning off autocommit */
            $conn->conn->beginTransaction();   

            if ($conn->do($sql, [$this->user_id, $this->total_price, $this->track_code])) {
                // get last inserted order id
                $this->id = $conn->conn->lastInsertId();
                $order_id = $this->id;
                // set details for every product
                foreach ($products as $product_arr) {
                    // set product details
                    $detail_obj                   = new Order_detail();
                    $detail_obj->order_id         = $order_id;
                    $detail_obj->product_id       = $product_arr['id'];
                    $detail_obj->product_quantity = $product_arr['quantity'];
                    // insert product to details table
                    $detail_obj->setOrderDetails();
                }

                $conn->conn->commit();
                return true;
            } // end if
            else {
                $this->errors['make_order'] = 'Problem in Save Data To Database';
                return false;
            }
        } catch (\PDOException $e) {
            die($e->getMessage());
            return false;
        }
    } // end method




    public function confirmOrder()
    {
        global $conn;
        $sql = "UPDATE orders SET is_confirmed = ? WHERE id = ?";
        try {
            /* Begin a transaction, turning off autocommit */
            $conn->conn->beginTransaction();   
            if ($conn->do($sql, [1, $this->id]) && Order_detail::confirmOrderDetails($this->id)) {
                $conn->conn->commit();
                return true;
            } else {
                $this->errors['confirm_order_error'] = "Error in Transaction :: DB";
                return false;
            }
            // save changes
            } catch (\PDOException $e) {
           
                $conn->conn->rollBack();
                $this->errors['confirm_order_error'] = "Error in Transaction";
                return false;
           
            }
           
    }



}