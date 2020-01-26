<?php
include('includes/head.php');
?>


<div class="container">
    <div class="row">
        <div class="col-lg-3">
        <form method="post" action="">
            <div class="form-group">
                <label for="exampleInputEmail1">User name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <small><a href="index.php">login </a></small>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?
include('includes/footer.php')

?>