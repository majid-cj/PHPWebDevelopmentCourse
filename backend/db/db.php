<?php

include 'config.php';

class Connection{
    public $conn ;
    public $data ;

    function __construct(){
        $this->data = json_decode(file_get_contents('php://input'));
        if ($this->conn == null){
            try {
                $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
                mysqli_set_charset($this->conn, "utf8");
            } catch (\Throwable $exception) {
                echo $exception;
            }
        }
    }

    public function getconn(){
        return $this->conn;
    }
}

