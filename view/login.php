<?php
include("includes/head.php");
?>
    <div class="container-fluid" style="margin-top: 10%">
        <form method="post" action="login.php" class="col-lg-4 login">
            <div class="form-group">
                <label for="exampleInputPhone1">User Phone</label>
                <input name="phone" type="tel" class="form-control" id="exampleInputPhone1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <small><a href="signin.php">signin </a></small>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

<?
include('includes/footer.php')
?>