function login() {
  const email = $("#login_email").val();
  const password = $("#login_password").val();

  const apiEndpoint = "../php/login_api.php";

  // post request to login_api.php with ajax call
  $.post(apiEndpoint, {
      'email': email,
      'password': password
  }, function(response) {
      if (response.success == false) {
          alert(response.message);
      } else {
          location.reload();
      }
  });

  return false;
}