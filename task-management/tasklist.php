<?php
    session_start();
    require_once "util.php";

    // check user if isn't logged-in and then redirect to login.php
    if(!isUserLoggedIn() && !isset($_SESSION['full_name'])) {
        header("Location: /cacttus-s3-basic-web/task-management/login.php");
        die();
    }
?>
<html>
<head>
    <title>Task Management Tool | Task List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
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
        <button id="task_add" type="button"><a href="/cacttus-s3-basic-web/task-management/taskadd.php">Add Task</a></button>
        <button id="sign_out" type="button"><a href="/cacttus-s3-basic-web/task-management/signout.php">Sign out</a></button>
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
            <?php
                if ($_SESSION['id'] == $task['id']) {
            ?>
                <td>
                    <button id="task_delete" type="button"><a href="/cacttus-s3-basic-web/task-management/taskdelete_api.php?delete= <?php echo $task['id_task']; ?>">DELETE</a></button>
                    <select id="task_status">
                        <option>ToDo</option>
                        <option>InProgress</option>
                        <option>Done</option>
                    </select>
                </td>
            <?php
            }
            ?>
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