<?php
include('backend/db/db.php');
include('backend/operations/user.php');

$db = new Connection("localhost", "root", "", "");
$db->connect();

$user = new Users($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET'){


}elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

}
?>