<?php
include('db/db.php');
include('operations/user.php');
include('operations/product.php');

$connection = new Connection();
$user = new Users($connection);
$product = new Product($connection);

$data = json_decode(file_get_contents('php://input'));

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    switch($_GET['url']){
        case 'gettypes':
            $user->getusertypes();
            break;

        case 'getcategories':
            $product->getproductcategory();
            break;

        case 'getproducts':
            $product->getproduct();
            break;

        case 'getmembers':
            $user->getmembers();
            break;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($_GET['url']) {
        case 'login':
            $user->login();
            break;

        case 'signup':
            $user->signup();
            break;

        case 'addcategory':
            $product->addproductcategory();
            break;

        case 'addproduct':
            $product->addproduct();
            break;

        case 'getproductsbycategory':
            $product->getproductbycategory();
            break;

        case 'searchproduct':
            $product->searchproduct();
            break;

        case 'searchformembers':
            $user->searchformembers();
            break;

        default:
            # code...
            break;
    }

}
?>