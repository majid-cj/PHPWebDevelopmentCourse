<?php
include('../includes/head.php')
?>


<div class="container mt-5">
    <form class="col-lg-6">
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="user_phone">User Phone</label>
            <input type="text" class="form-control" id="user_phone">
        </div>
        <div class="form-group">
            <label for="user_password">User Password</label>
            <input type="password" class="form-control" id="user_password">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="user_type">Select Member Type</label>
            </div>
            <select class="custom-select" id="user_type">
                <option id="0">---------</option>
            </select>
        </div>
        <a id="add_user" class="btn btn-primary">add</a>
    </form>

    <div id="error_msg"></div>
</div>



<?php
$js = "add_account.js";
include '../includes/footer.php';
?>