<?php
include("includes/head.php");
?>
    <div class="container-fluid" style="margin-top: 10%">
        <form method="post" action="backend/index.php" class="col-lg-4 signin">
            <div class="form-group">
                <label for="exampleInputName1">User Name</label>
                <input type="email" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <small><a href="login.php">login </a></small>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?
include('includes/footer.php')

?>