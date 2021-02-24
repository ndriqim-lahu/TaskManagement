<?php
    session_start();
    require_once "util.php";
    
    // check user if logged-in and then redirect to tasklist.php
    if (isUserLoggedIn()) {
        header("Location: /cacttus-s3-basic-web/task-management/tasklist.php");
        die();
    }
?>
<html>
<head>
    <title>Task Management Tool | Login</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <center>
        <br><br>
        <p><b>Task Management Tool - LOGIN</b></p>
        <br><br>
        <form onsubmit="return login();">
            <label>Email:</label><br>
            <input id="login_email" type="email" name="email" required/><br><br>
            <label>Password:</label><br>
            <input id="login_password" type="password" name="password" required/><br><br>
            <input type="submit" value="Login"/>
        </form>
        <br>
        <a href="/cacttus-s3-basic-web/task-management/register.php">Register</a> if you don't have an account!
    </center>
</body>
<script>
    function login() {
        const email = $("#login_email").val();
        const password = $("#login_password").val();

        const apiEndpoint = "/cacttus-s3-basic-web/task-management/login_api.php";

        // post request to login_api.php with ajax call
        $.post(apiEndpoint, {
            'email' : email,
            'password' : password
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