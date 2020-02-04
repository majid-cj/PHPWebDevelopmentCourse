$(document).ready(function() {
  getCategories();
  getProducts();
  getProductsByCategory();
  searchForProduct();
});

function getProducts() {
  $.ajax({
    url: "../../backend/index.php?url=getproducts",
    method: "get",
    dataType: "json",
    success: response => drawTable(response)
  });
}

function getProductsByCategory() {
  $("#product_category").on("click", function() {
    let id = $("#product_category option:selected").val();
    $.ajax({
      url: `../../backend/index.php?url=getproductsbycategory`,
      method: "post",
      dataType: "json",
      data: JSON.stringify({ id: id }),
      success: function(response) {
        drawTable(response);
      },
      error: function(response) {
        drawTable(response);
      }
    });
  });
}

function searchForProduct() {
  $("#search_product").on("keyup", function() {
    let search = $("#search_product").val();
    $.ajax({
      url: `../../backend/index.php?url=searchproduct`,
      method: "post",
      dataType: "json",
      data: JSON.stringify({ search: search }),
      success: function(response) {
        drawTable(response);
      },
      error: function(response) {
        drawTable(response);
      }
    });
  });
}

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

function drawTable(response) {
  response = typeof response == "string" ? JSON.parse(response) : response;
  if (!response.error) {
    $("#products_view")
      .empty()
      .append(
        `<table id="productstable" class="table table-hover w-100 table-sm text-center">`
      );
    $("#productstable").append(`<thead class="thead-dark">
                                    <tr>
                                        <th class="th">image</th>
                                        <th class="th">name</th>
                                        <th class="th">price</th>
                                        <th class="th">category</th>
                                        <th class="th">description</th>
                                        <th class="th"></th>
                                    </tr>
                                </thead>`);
    $("#productstable").append('<tbody id="tbody"></tbody>');

    response.data.forEach(element => {
      $("#tbody").append(`<tr>
        <td><img src="../../${element.image}" alt="" border=3 height=50 width=50></td>
        <td>${element.name}</td>
        <td>${element.category}</td>
        <td>${element.price}</td>
        <td>${element.desc}</td>
        <td>
        </td>
    </tr>`);
    });
  } else {
    $("#products_view").empty()
      .append(`<div class="text-center alert alert-danger col-lg-6" style="margin: auto ;margin-top: 32px; font-size: 18px" role="alert">
                ${response.data}
                </div>`);
  }
}
