<?php
    require_once "util.php";

    if(isset($_GET['delete'])){
        $id_task = $_GET['delete'];
        deleteTaskFromDatabase($id_task);      
    };

    header("Location: /cacttus-s3-basic-web/task-management/tasklist.php");
?>