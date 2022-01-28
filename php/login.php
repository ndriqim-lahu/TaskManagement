<?php
    session_start();
    require_once "./util.php";

    // check user if logged-in and then redirect to tasklist.php
    if (isUserLoggedIn()) {
        header("Location: ./tasklist.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Task Management Tool" />
    <meta name="author" content="Ndriçim Lahu" />

    <title>Task Management Tool | Login</title>

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
    <center>
        <br><br>
        <p><b>Task Management Tool - LOGIN</b></p>
        <br><br>
        <form onsubmit="return login();">
            <label>Email:</label><br>
            <input id="login_email" type="email" name="email" required /><br><br>
            <label>Password:</label><br>
            <input id="login_password" type="password" name="password" required /><br><br>
            <input type="submit" value="Login" />
        </form>
        <br>
        <a href="./register.php">Register</a> if you don't have an account!
    </center>
</body>
<script>
    function login() {
        const email = $("#login_email").val();
        const password = $("#login_password").val();

        const apiEndpoint = "./login_api.php";

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
</script>

</html>