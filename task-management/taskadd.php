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
        <form method="POST" action="/cacttus-s3-basic-web/task-management/tasklist.php">
            <label>Title:</label><br>
            <input type="text" name="title"/><br><br>
            <label>Description:</label><br>
            <textarea rows="7" cols="22" name="description"></textarea><br><br>
            <label>Status:</label><br>
            <select>
                <option>ToDo</option>
                <option>InProgress</option>
                <option>Done</option>
            </select>
            <br><br>
            <input type="submit" value="Add"/>
        </form>
        <br>
    </center>
</body>
</html>