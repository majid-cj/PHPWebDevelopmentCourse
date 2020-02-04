$(document).ready(function() {
  getCategories();
  addProduct();
});

function getCategories() {
  $.ajax({
    url: "../../backend/index.php?url=getcategories",
    method: "get",
    dataType: "json",
    success: function(response) {
      if (!response.error) {
        $("#product_category").empty();
        response.data.forEach(element => {
          $("#product_category").append(
            `<option value="${element.id}">${element.name}</option>`
          );
        });
      } 
    }
  });
}

function addProduct() {
  $("#add_product").on("click", function() {
    var dataform = new FormData();
    dataform.append("name", $("#product_name").val());
    dataform.append("price", $("#product_price").val());
    dataform.append("description", $("#product_description").val());
    dataform.append("category", $("#product_category option:selected").val());
    dataform.append("file", $("#product_images").prop("files")[0]);

    $.ajax({
      url: "../../backend/index.php?url=addproduct",
      method: "POST",
      processData: false,
      contentType: false,
      async: false,
      cache: false,
      data: dataform
    }).always(response => formError(response));
  });
}

function formError(response) {
  response = typeof response == "string" ? JSON.parse(response) : response;
  var warning = !response.error ? "alert-success" : "alert-danger";
  $("#error_msg")
    .append(`<div id="show_alert" class="text-center alert col-lg-8 ${warning}" style="margin: auto ;margin-top: 8px; font-size: 14px" role="alert">
                ${response.data}
            </div>`);
  setTimeout(() => {
    $("#show_alert").remove();
  }, 5000);
}
