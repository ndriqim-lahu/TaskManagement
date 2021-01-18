<?php
    session_start();
    require_once "util.php";

    // check user if isn't logged-in and then redirect to login.php
    if (!isUserLoggedIn()) {
        header("Location: /cacttus-s3-basic-web/task-management/login.php");
        die();
    }
?>
<html>
<head>
    <title>Task Management Tool | Add Task</title>
</head>
<style>
#title_task {
    width: 14%;
    height: 3%;
}

#description_task {
    width: 14%;
    height: 14%;
}

#status_task {
    width: 14%;
    height: 3%;
}

#add_task {
    width: 6%;
    height: 4%;
    background-color: silver;
}
</style>
<body>
    <center>
        <br><br>
        <p><b>Task Management Tool - ADD TASK</b></p>
        <br><br>
        <form method="POST" action="/cacttus-s3-basic-web/task-management/taskadd_api.php">
            <label>Title:</label><br>
            <input id="title_task" type="text" name="title"/><br><br>
            <label>Description:</label><br>
            <textarea id="description_task" name="description"></textarea><br><br>
            <label>Status:</label><br>
            <select id="status_task" name="status">
                <option>ToDo</option>
                <option>InProgress</option>
                <option>Done</option>
            </select>
            <br><br>
            <input id="add_task" type="submit" value="Add"/>
        </form>
        <br>
    </center>
</body>
</html>