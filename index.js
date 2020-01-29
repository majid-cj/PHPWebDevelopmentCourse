$.ajax({
  type: "get",
  url: "http://localhost:8000/backend/index.php?url=gettypes",
  success: function(response) {
    console.log(response);
  }
});