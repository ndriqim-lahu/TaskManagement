<?php
    session_start();
    require_once "./util.php";

    // check user if logged-in and then redirect to tasklist.php
    if (isUserLoggedIn()) {
        header("Location: ./tasklist.php");
        die();
    }
?>
<html>

<head>
    <!-- Meta Data -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Task Management Tool" />
    <meta name="author" content="Ndriçim Lahu" />

    <title>Task Management Tool | Register</title>

    <!-- Favicons -->
    <link href="../assets/favicon/android-chrome-192x192.png" rel="android-chrome-icon" />
    <link href="../assets/favicon/android-chrome-512x512.png" rel="android-chrome-icon" />
    <link href="../assets/favicon/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="../assets/favicon/favicon-16x16.png" rel="icon" />
    <link href="../assets/favicon/favicon-32x32.png" rel="icon" />
    <link href="../assets/favicon/favicon.ico" rel="icon" />

    <!-- Icon Pack -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Font Pack -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Navigation -->
    <nav
      class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-dark"
      id="mainNav"
    >
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand text-white" href="./index.html">Task Management Tool</a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" href="../index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./register.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <center>
        <br><br><br><br>
        <h4>
            <b>Register</b>
            <br>
            for account
        </h4>
        <br><br>
        <form method="POST" action="./register_api.php" onsubmit="return validatePassword();">
            <label for="fullname">Full Name:</label><br>
            <input id="register_fullname" class="rounded-pill p-1" type="text" name="full_name" size="50" required /><br><br>
            <label>Email:</label><br>
            <input id="register_email" class="rounded-pill p-1" type="email" name="email" size="50" required /><br><br>
            <label>Password:</label><br>
            <input id="register_password" class="rounded-pill p-1" type="password" name="password" size="50" required /><br><br>
            <input type="submit" value="Register" class="btn btn-primary btn-lg" />
        </form>
        <br><br>
    </center>
</body>
<script>
    function validatePassword() {
        var password = document.getElementById("register_password").value;

        // check empty password of field
        if (password == "") {
            alert("Fill the password please!");
            return false;
        }

        // check minimum length of password validation
        if (password.length < 8) {
            alert("Password length must be atleast 8 characters!");
            return false;
        }

        // check maximum length of password validation
        if (password.length > 16) {
            alert("Password length must not exceed 16 characters!");
            return false;
        }

        // check uppercase of password validation
        if (password.search(/[A-Z]/i) < 0) {
            alert("Password must have atleast one uppercase!");
            return false;
        }

        // check lowercase of password validation
        if (password.search(/[a-z]/i) < 0) {
            alert("Password must have atleast one lowercase!");
            return false;
        }

        // check number of password validation
        if (password.search(/[0-9]/) < 0) {
            alert("Password must have atleast one digit number!");
            return false;
        }

        // check special characters of password validation
        if (password.search(/[!@#$%^&*]/) < 0) {
            alert("Password must have atleast one special character!");
            return false;
        }
    }
</script>

</html>