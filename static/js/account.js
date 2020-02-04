$(document).ready(function() {
  getMembers();
  searchForMember();
});

function getMembers() {
  $.ajax({
    url: "../../backend/index.php?url=getmembers",
    method: "get",
    dataType: "json",
    success: response => drawTable(response)
  });
}

function searchForMember() {
  $("#search_product").on("keyup", function() {
    let search = $("#search_product").val();
    $.ajax({
      url: `../../backend/index.php?url=searchformembers`,
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

function drawTable(response) {
  response = typeof response == "string" ? JSON.parse(response) : response;
  if (!response.error) {
    $("#members_view")
      .empty()
      .append(
        `<table id="memberstable" class="table table-hover w-100 table-sm text-center">`
      );
    $("#memberstable").append(`<thead class="thead-dark">
                                      <tr>
                                        <th class="th">#</th>
                                          <th class="th">name</th>
                                          <th class="th">phone</th>
                                          <th class="th">member type</th>
                                      </tr>
                                  </thead>`);
    $("#memberstable").append('<tbody id="tbody"></tbody>');

    response.data.forEach(element => {
      $("#tbody").append(`<tr>
        <td>${element.id}</td>
        <td>${element.name}</td>
        <td>${element.phone}</td>
        <td>${element.type}</td>
      </tr>`);
    });
  } else {
    $("#members_view").empty()
      .append(`<div class="text-center alert alert-danger col-lg-6" style="margin: auto ;margin-top: 32px; font-size: 18px" role="alert">
                  ${response.data}
                  </div>`);
  }
}
