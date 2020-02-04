$(document).ready(function() {
  getUsersTypes();
  addMembers();
});

function getUsersTypes() {
  $.ajax({
    url: "../../backend/index.php?url=gettypes",
    method: "get",
    dataType: "json",
    success: function(response) {
      if (!response.error) {
        $("#user_type").empty();
        response.data.forEach(element => {
          $("#user_type").append(
            `<option value="${element.id}">${element.type}</option>`
          );
        });
      }
    }
  });
}

function addMembers() {
  $("#add_user").on("click", function() {
    $.ajax({
      url: "../../backend/index.php?url=signup",
      method: "POST",
      dataType: "json",
      data: JSON.stringify({
        name: $("#user_name").val(),
        phone: $("#user_phone").val(),
        password: $("#user_password").val(),
        user_type: $("#user_type option:selected").val()
      })
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
