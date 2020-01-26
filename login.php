<?php
include('includes/head.php');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
        <form method="post" action="backend/index.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <small><a href="signin.php">signin </a></small>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?
include('includes/footer.php')

?>