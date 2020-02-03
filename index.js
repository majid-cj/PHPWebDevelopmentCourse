$("#login_button").on("click", () => {
  var phone = $("#phone").val();
  var password = $("#password").val();

  $.ajax({
    url: "backend/index.php?url=login",
    method: "post",
    dataType: "json",
    data: JSON.stringify({ phone: phone, password: password }),
    error: response => {
      $("#error_msg").append(
        '<p class="alert alert-danger">error on login</p>'
      );
    }
  }).done(response => {
    if (response.error) {
      $("#error_msg").append(
        '<p class="alert alert-danger">' + response.data + "</p>"
      );
    } else {
      $("#error_msg").append(
        '<p class="alert alert-success">' + response.data.phone + "</p>"
      );
    }
  });
});

$("#add_to_cart").on("click", () => {
  $.ajax({
    url: "backend/index.php?url=add_cart",
    method: "post",
    dataType: "json",
    data: JSON.stringify({ member: member_id, product: product_id })
  }).done(response => console.log(response));
});
