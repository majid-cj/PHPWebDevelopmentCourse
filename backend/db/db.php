<?php

class Connection{
    var $host;
    var $user;
    var $password;
    var $port;

    var $connect;

    public function __construct($_host, $_user, $_password, $_port){
        $this->host = $_host;
        $this->user = $_user;
        $this->password = $_password;
        $this->port = $_port;
    }

    public function connect(){
        try {
            $this->connect = mysqli_connect($this->host, $this->user, $this->password, $this->port);
            $this->createDB();
        } catch (\Throwable $th) {
            echo '<div class="alert alert-danger" role="alert">A simple danger alert—check it out!</div>';
        }
    }

    public function createDB(){
        $sql = "CREATE DATABASE IF NOT EXISTS store";
        mysqli_query($this->connect, $sql);
    }
}