<?php
include('../includes/head.php')
?>


<div class="container mt-5">
    <form class="col-lg-6">
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="product_price">Product Price</label>
            <input type="number" class="form-control" id="product_price">
        </div>
        <div class="form-group">
            <label for="product_description">Product Description</label>
            <input type="text" class="form-control" id="product_description">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="product_category">Select Category</label>
            </div>
            <select class="custom-select" id="product_category">
                <option id="0">---------</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="product_image">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="product_images" aria-describedby="product_image">
                <label class="custom-file-label" for="product_images">choose image</label>
            </div>
        </div>
        <a id="add_product" class="btn btn-primary">add</a>
    </form>

    <div id="error_msg"></div>
</div>



<?php
$js = "add_product.js";
include '../includes/footer.php' ;
?>