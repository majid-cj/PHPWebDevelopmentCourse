<?php
include('db/db.php');
include('operations/user.php');
include('operations/product.php');

$connection = new Connection();
$user = new Users($connection->getconn());
$product = new Product($connection->getconn());

if ($_SERVER['REQUEST_METHOD'] == 'GET'){


}elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user->login($_POST["phone"], $_POST["password"]);
}
?>