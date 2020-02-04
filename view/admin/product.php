<?php
include('../includes/head.php')
?>


<div class="container mt-5">
    <div class="form-inline">
        <a class="btn btn-info m-1" href="add_product.php">Add New Product </a>
        <div class="input-group m-1 col-lg-6">
            <div class="input-group-prepend">
                <label class="input-group-text" for="product_category">Select Category</label>
            </div>
            <select class="custom-select" id="product_category">
            </select>
        </div>
    </div>

    <div id="products_view"></div>
</div>



<?php
$js = "product.js";
include '../includes/footer.php';
?>