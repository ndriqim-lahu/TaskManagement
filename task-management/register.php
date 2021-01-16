<?php
    session_start();
    require_once "util.php";

    // if logged in then redirect to tasklist.php
    if (isUserLoggedIn()) {
        header("Location: /cacttus-s3-basic-web/task-management/tasklist.php");
        die();
    }
?>
<html>
<head>
    <title>Task Management Tool | Register</title>
</head>
<body>
    <center>
        <br><br>
        <p><b>Task Management Tool - REGISTER</b></p>
        <br><br>
        <form method="POST" action="/cacttus-s3-basic-web/task-management/register_api.php" onsubmit="return validatePassword();">
            <label>Full Name:</label><br>
            <input id="register_fullname" type="text" name="full_name"/><br><br>
            <label>Email:</label><br>
            <input id="register_email" type="email" name="email"/><br><br>
            <label>Password:</label><br>
            <input id="register_password" type="password" name="password"/><br><br>
            <input type="submit" value="Register"/>
        </form>
        <br>
        <a href="/cacttus-s3-basic-web/task-management/login.php">Login</a> if you already have an account!
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