<?php

include 'config.php';

class Connection{
    public $conn ;
    public $data ;
    public $response;

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

    function getdata(){
        return $this->data;
    }

    function mkdir($target_path){
        if(!file_exists($target_path)){
            mkdir($target_path, 0777, false);
        }
    }

    function targetpath($path, $file, $type){
        return $path.substr(sha1(md5($file)), rand(0,16), rand(24,32)).round(microtime(true)).'.'.$type;
    }

    function setresponse($data, $error = TRUE){
        $this->response['data'] = $data;
        $this->response['error'] = ($error)? TRUE : FALSE;
        $this->response();
    }

    function response(){
        echo json_encode($this->response, 128);
    }
}

