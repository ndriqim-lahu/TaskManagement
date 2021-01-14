<?php
    session_start();
    require_once "util.php";

    // if logged in then redirect to login.php
    if (!isUserLoggedIn()) {
        header("Location: /cacttus-s3-basic-web/task-management/login.php");
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
        <button id="task_add" type="button"><a href="/cacttus-s3-basic-web/task-management/taskadd_api.php">Add Task</a></button>
        |
        <button id="sign_out" type="button"><a href="/cacttus-s3-basic-web/task-management/signout.php">Sign out</a></button>
        <br>
    </center>
</body>
</html>