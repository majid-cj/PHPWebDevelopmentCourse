<?php

class Product{

    public $connect;

    public function __construct($_connect){
        $this->connect = $_connect;
    }

    public function addproductcategory(){
        $sql = "INSERT INTO category (name)
                VALUES(?)";
        if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $stmt->bind_param('s', $this->connect->getdata()->name);
            if($stmt->execute()){
                $this->connect->setresponse(SUCCESS_INSERTION, FALSE);
            }else{
                $this->connect->setresponse(ERROR_INSERTION);
            }
        }else{
            $this->connect->setresponse(mysqlierr);
        }
    }

    public function getproductcategory(){
        $sql = "SELECT id, name
                FROM
                    category";
        if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($id, $name);
                $arr = array();
                while($stmt->fetch()){
                    $types = array(
                        'id' => $id,
                        'name' => $name
                    );
                    array_push($arr, $types);
                }
                $this->connect->setresponse($arr, FALSE);
            }else{
                $this->connect->setresponse(NO_DATA);
            }
        }else{
            $this->connect->setresponse(ERROR_DB_CONNECT);
        }
    }

    public function addproduct(){
        $sql = "INSERT INTO products(category, name, description, image, price)
                VALUES(?, ?, ?, ?, ?)";

        if(isset($_FILES['file']['name'])){
            $target_path = "media/products_images/";
            $this->connect->mkdir($target_path);
            $allowed_extensions = array('jpg', 'jpeg', 'png');
            $file_type = end(explode('.', $_FILES['file']['name']));
            $target_path = $this->connect->targetpath($target_path, $_FILES['file']['name'], $file_type);

            if(in_array($file_type, $allowed_extensions)){
                $temp = $_FILES['file']['tmp_name'];
                if(move_uploaded_file($temp, $target_path)){
                    if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
                        $stmt->bind_param('issss',
                        $_POST['category'],
                        $_POST['name'],
                        $_POST['description'],
                        $target_path,
                        $_POST['price']);
                        if($stmt->execute()){
                            $this->connect->setresponse(SUCCESS_INSERTION, FALSE);
                        }else{
                            $this->connect->setresponse(ERROR_INSERTION);
                        }
                    }else{
                        $this->connect->setresponse(ERROR_DB_CONNECT);
                    }
                }else{
                    $this->connect->setresponse(ERROR_UPLOAD);
                }
            }else{
                $this->connect->setresponse(NOT_SUPPORT);
            }
        }else{
            $this->connect->setresponse(NO_FILE);
        }
    }

    public function getproduct(){
        $sql = "SELECT products.id,
                        products.name,
                        category.name,
                        products.price,
                        products.description,
                        products.image
                FROM
                    products
                INNER JOIN category ON products.category = category.id";
        if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($id, $name, $category, $price, $desc, $image);
                $arr = array();
                while($stmt->fetch()){
                    $types = array(
                        'id' => $id,
                        'name' => $name,
                        'category' => $category,
                        'price' => $price,
                        'desc' => $desc,
                        'image' => 'backend/'.$image,
                    );
                    array_push($arr, $types);
                }
                $this->connect->setresponse($arr, FALSE);
            }else{
                $this->connect->setresponse(NO_DATA);
            }
        }else{
            $this->connect->setresponse(ERROR_DB_CONNECT);
        }
    }

    public function getproductbycategory(){
        $sql = "SELECT products.id,
                        products.name,
                        category.name,
                        products.price,
                        products.description,
                        products.image
                FROM
                    products
                INNER JOIN category ON products.category = category.id
                AND category.id = ?";
        if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $stmt->bind_param('i', $this->connect->getdata()->id);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($id, $name, $category, $price, $desc, $image);
                $arr = array();
                while($stmt->fetch()){
                    $types = array(
                        'id' => $id,
                        'name' => $name,
                        'category' => $category,
                        'price' => $price,
                        'desc' => $desc,
                        'image' => 'backend/'.$image,
                    );
                    array_push($arr, $types);
                }
                $this->connect->setresponse($arr, FALSE);
            }else{
                $this->connect->setresponse(NO_DATA);
            }
        }else{
            $this->connect->setresponse(ERROR_DB_CONNECT);
        }
    }

    function searchproduct(){
        $sql = "SELECT products.id,
                        products.name,
                        category.name,
                        products.price,
                        products.description,
                        products.image
                FROM
                    products
                INNER JOIN category ON products.category = category.id
                WHERE
                    products.name LIKE ?";
        if($stmt = mysqli_prepare($this->connect->getconn(), $sql)){
            $search = "%".$this->connect->getdata()->search."%";
            $stmt->bind_param('s', $search);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result($id, $name, $category, $price, $desc, $image);
                $arr = array();
                while($stmt->fetch()){
                    $types = array(
                        'id' => $id,
                        'name' => $name,
                        'category' => $category,
                        'price' => $price,
                        'desc' => $desc,
                        'image' => 'backend/'.$image,
                    );
                    array_push($arr, $types);
                }
                $this->connect->setresponse($arr, FALSE);
            }else{
                $this->connect->setresponse(NO_DATA);
            }
        }else{
            $this->connect->setresponse(ERROR_DB_CONNECT);
        }
    }
}

