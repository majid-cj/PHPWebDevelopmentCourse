<?php
session_start();

if (isset($_SESSION['logged'])) {
    header('login.php');
}

include('includes/head.php');
?>



<?php
include('includes/footer.php');
?>