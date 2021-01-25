<?php
namespace classes;

class User extends Main
{
    protected static $class_name = "classes\User";
    protected static $db_name = "users";
    protected static $auto_inc = "id";

    public $id, $name, $email, $password, $address, $buy_count, $created_at;

    /*********************** Methods *************************** */

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
            if ($this->create()) 
                return true;
        } catch (\PDOException $e) {
            $this->errors['create_user_error'] = $e->getMessage();
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

    public function updateUserPassword(){
        global $conn;
        // encrypt password
        $this->password = $this->encryptPassword();
        // run query
        try {
            // update password sql
            $sql = "UPDATE users SET password = ? WHERE id = ?";

            if ($conn->do($sql, [$this->password, $this->id])) 
                return true;
            else 
                return false;
        } catch (\PDOException $e) {
            $this->errors['update_user__pass_error'] = $e->getMessage();
            return false;
        }
        return false;
    }


    public function create(){
        global $conn;
        $sql = "INSERT INTO users (name, email, password, address) values (?,?,?,?)";
        return $conn->do($sql, [$this->name, $this->email, $this->password, $this->address]);
    }

    public function update(){
        global $conn;
        $sql = "UPDATE users SET name = ?, email = ?, address = ? Where id = ?";
        return $conn->do($sql, [$this->name, $this->email, $this->address, $this->id]);
    }


    public static function login ($email, $password) {
        global $conn;
        $user = static::findWhere([['email', '=', $email]], 1);
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $_SESSION['user_info'] = [
                    'id'      => $user->id ,
                    'name'    => $user->name ,
                    'email'   => $user->email ,
                    'address' => $user->address ,
                ];
            } else {
                return false;
            }
        }
        return false;
    }



}