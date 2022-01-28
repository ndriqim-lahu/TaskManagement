<?php
    session_start();
    require_once "./util.php";

    // get the data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $id = $_SESSION['id'];

    // fill the data
    $task = [
        'title' => $title,
        'description' => $description,
        'status' => $status,
        'id' => $id
    ];

    storeTaskToDatabase($task);

    header("Location: ./tasklist.php");
?>