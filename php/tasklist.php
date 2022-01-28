<?php
    session_start();
    require_once "./util.php";

    // check user if isn't logged-in and then redirect to login.php
    if(!isUserLoggedIn() && !isset($_SESSION['full_name'])) {
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

    <title>Task Management Tool | Task List</title>

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
    a {
        color: white;
        text-decoration: none;
    }

    #task_add {
        background-color: grey;
        color: black;
        margin-left: 30px;
        padding: 5px;
        text-decoration: none;
    }

    #sign_out {
        background-color: grey;
        color: black;
        margin-left: 15px;
        padding: 5px;
    }

    .table {
        margin: 10px;
        background-color: silver;
    }

    #task_status {
        float: right;
        margin: 10px;
        padding: 5px;
    }

    #task_delete {
        background-color: red;
        color: white;
        float: right;
        margin: 10px;
        padding: 5px;
    }
</style>
<body>
    <center>
        <br><br>
        <p><b>Task Management Tool - TASK LIST</b></p>
        <br><br>
        Welcome <b><?php echo $_SESSION['full_name'] ?></b>
        <button id="task_add" type="button"><a href="./taskadd.php">Add Task</a></button>
        <button id="sign_out" type="button"><a href="./signout.php">Sign out</a></button>
        <br><br>
        <?php
            $id = $_SESSION['id'];
            $tasks = getTaskFromDatabase();

            if (empty($tasks)) {
                ?>
                    <div>
                        No tasks exist by this user, but you can try to add some new!
                    </div>
                <?php
            } else {
                foreach ($tasks as $task) {
                ?>
                <div class="container">
                <div class="row justify-content-center">
                <table class="table">
                <thead>
                    <tr>
                    <td>
                        <u>Title:</u> <?php echo $task['title']; ?><br>
                        <u>Description:</u> <?php echo $task['description']; ?><br>
                        <u>Status:</u> <?php echo $task['status']; ?>
                    </td>
                    <td>
                    <button id="task_delete" type="button"><a href="./taskdelete_api.php?delete= <?php echo $task['id_task']; ?>">DELETE</a></button>
                    <select id="task_status">
                        <option>ToDo</option>
                        <option>InProgress</option>
                        <option>Done</option>
                    </select>
                </td>
                </tr>
            </thead>
            </div>
            </div>
            <hr>
            <?php
                }
            }
        ?>
    </center>
</body>
</html>