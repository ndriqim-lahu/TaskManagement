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
        <form method="POST" action="/cacttus-s3-basic-web/task-management/register_api.php">
            <label>Full Name:</label><br>
            <input type="text" name="full_name"/><br><br>
            <label>Email:</label><br>
            <input type="email" name="email"/><br><br>
            <label>Password:</label><br>
            <input type="password" name="password"/><br><br>
            <input type="submit" value="Register"/>
        </form>
        <br>
        <a href="/cacttus-s3-basic-web/task-management/login.php">Login</a> if you already have an account!
    </center>
</body>
</html>