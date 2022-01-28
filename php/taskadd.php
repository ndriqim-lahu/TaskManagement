<?php
    session_start();
    require_once "./util.php";

    // check user if isn't logged-in and then redirect to login.php
    if (!isUserLoggedIn()) {
        header("Location: ./login.php");
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

    <title>Task Management Tool | Add Task</title>

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
        <form method="POST" action="./taskadd_api.php">
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