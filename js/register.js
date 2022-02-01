function validatePassword() {
  var password = document.getElementById("register_password").value;

  // check empty password of field
  if (password == "") {
      alert("Fill the password please!");
      return false;
  }

  // check minimum length of password validation
  if (password.length < 8) {
      alert("Password length must be at least 8 characters!");
      return false;
  }

  // check maximum length of password validation
  if (password.length > 16) {
      alert("Password length must not exceed 16 characters!");
      return false;
  }

  // check uppercase of password validation
  if (password.search(/[A-Z]/i) < 0) {
      alert("Password must have at least one uppercase!");
      return false;
  }

  // check lowercase of password validation
  if (password.search(/[a-z]/i) < 0) {
      alert("Password must have at least one lowercase!");
      return false;
  }

  // check number of password validation
  if (password.search(/[0-9]/) < 0) {
      alert("Password must have at least one digit number!");
      return false;
  }

  // check special characters of password validation
  if (password.search(/[!@#$%^&*]/) < 0) {
      alert("Password must have at least one special character!");
      return false;
  }
}