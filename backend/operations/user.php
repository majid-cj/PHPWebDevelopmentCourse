<?php
class Users{

    var $connect;

    public function __construct($_connect){
        $this->connect = $_connect;
    }

    public function login($phone, $password){
        $sql = "SELECT id, phone, password
                FROM accounts
                WHERE phone = ?";
        $stmt = mysqli_query($this->connect, $sql);

        if($stmt->num_rows > 0){
            if (password_verify($password, $db_password)){

            }
        }
    }

    public function signup($name, $phone, $password){
        $sql = "INSERT INTO account (name, phone, password)
                VALUE(?, ?, ?)";

        $hash_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 8));

        mysqli_query($stmt, $sql);
    }
}
