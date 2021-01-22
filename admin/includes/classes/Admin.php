<?php
namespace classes;

class Admin extends Main
{
    //id	name	email	password	created_at	
    protected static $class_name = "classes\Admin";

    protected static $db_name = "admin_users";
    protected static $auto_inc = "id";

    public $id, $name, $email, $password, $created_at;


    /** Protected Properties */
    

    /*********************** Methods *************************** */

    /**
     * Register Admin function
     */
    public function register()
    {
        if (!isset($this->name) || !isset($this->email) || !isset($this->password)) 
            return false;
        $this->password = $this->encryptPassword();
        try {
            // die(var_dump($this));
            if ($this->create()) 
                return true;
        } catch (\PDOException $e) {
            $this->errors['create_admin_error'] = $e->getMessage();
            return false;
        }
        
        return false;
    }
    /**
     * Encrypt Password
     */
    public function encryptPassword()
    {
        $pass_randsalt = "IwillSeeeYouIfyouTryto";
        $pass_options = [
            'cost' => 12,
        ];
        if (isset($this->password)) {
            return password_hash($this->password,PASSWORD_DEFAULT, $pass_options);
        } else {
            return false;
        }
    }


    public function create(){
        global $conn;
        $sql = "INSERT INTO admin_users (name, email, password) values (?,?,?)";
        return $conn->do($sql, [$this->name, $this->email, $this->password]);
    }
}