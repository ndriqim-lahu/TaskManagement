<?php
    session_start();
    require_once "util.php";

    // if logged in then redirect to login.php
    if (!isUserLoggedIn()) {
        header("Location: /task-management/login.php");
        die();
    }
?>
<html>
<head>
    <title>Task Management Tool | TASKLIST</title>
</head>
<body>
    <center>
        <br><br>
        <p><b>Task Management Tool - Tasklist</b></p>
        <br><br>
        <a href="/task-management/signout.php">Sign out!</a>
        <br>
    </center>
</body>
</html>