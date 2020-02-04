<?php
session_start();

class Users{

    var $connect;

    public function __construct($_connect){
        $this->connect = $_connect;
    }

    public function getusertypes(){
        $sql = "SELECT id, name
                FROM user_types";
        $arr = array();
        if ($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows() > 0){
                $stmt->bind_result($id, $name);
                while($stmt->fetch()){
                    $types = array(
                        'id' => $id,
                        'type' => $name
                    );
                    array_push($arr, $types);
                }
                $this->connect->setresponse($arr, FALSE);
            }else{
                $this->connect->setresponse('no member types');
            }
        }else{
            $this->connect->setresponse(ERROR_DB_CONNECT);
        }
    }

    function getmembers(){
        $sql = "SELECT members.id, members.name, members.phone, user_types.name
                FROM
                    members
                INNER JOIN user_types ON members.user_type = user_types.id";
        if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($id, $name, $phone, $type);
                $arr = array();
                while($stmt->fetch()){
                    $members = array(
                        'id' => $id,
                        'name' => $name,
                        'phone' => $phone,
                        'type' => $type,
                    );
                    array_push($arr, $members);
                }
                $this->connect->setresponse($arr, FALSE);
            }else{
                $this->connect->setresponse(NO_DATA);
            }
        }else{
            $this->connect->setresponse(ERROR_DB_CONNECT);
        }
    }

    function searchformembers(){
        $sql = "SELECT members.id, members.name, members.phone, user_types.name
                FROM
                    members
                INNER JOIN user_types ON members.user_type = user_types.id
                WHERE
                    members.phone like ?";
        if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $search = "%".$this->connect->getdata()->search."%";
            $stmt->bind_param('s', $search);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($id, $name, $phone, $type);
                $arr = array();
                while($stmt->fetch()){
                    $members = array(
                        'id' => $id,
                        'name' => $name,
                        'phone' => $phone,
                        'type' => $type,
                    );
                    array_push($arr, $members);
                }
                $this->connect->setresponse($arr, FALSE);
            }else{
                $this->connect->setresponse(NO_DATA);
            }
        }else{
            $this->connect->setresponse(ERROR_DB_CONNECT);
        }
    }

    public function login(){
        $sql = "SELECT id, name, phone, password
                FROM members
                WHERE phone = ?";
        $stmt = mysqli_prepare($this->connect->getconn(), $sql);
        $stmt->bind_param('s', $this->connect->getdata()->phone);
        $stmt->execute();
        $stmt->bind_result($id, $name, $phone, $hash_password);
        $stmt->store_result();
        $stmt->fetch();
        if($stmt->num_rows() > 0){
            if (password_verify($this->connect->getdata()->password, $hash_password)){
                $this->connect->setresponse(array(
                    'id' => $id,
                    'name' => $name,
                    'phone' => $phone
                ), FALSE);
            }else{
                $this->connect->setresponse('password is wrong try again !');
            }
        }else{
            $this->connect->setresponse('no user with this phone number');
        }
    }

    public function signup(){
        if (strlen($this->connect->getdata()->phone) < 10){
            $this->connect->setresponse('enter a valid phone number');
        }else{
            $sql = "INSERT INTO members (user_type, name, phone, password)
                    VALUE(?, ?, ?, ?)";
            $hash_password = password_hash($this->connect->getdata()->password, PASSWORD_BCRYPT, array('cost' => 8));
            $stmt = mysqli_prepare($this->connect->getconn(), $sql);
            $stmt->bind_param('isss', $this->connect->getdata()->user_type,
                                    $this->connect->getdata()->name,
                                    $this->connect->getdata()->phone,
                                    $hash_password);
            if ($stmt->execute()){
                $this->connect->setresponse('signup successfully !', FALSE);
            }else{
                $this->connect->setresponse('signup not success');
            }
        }
    }
}
