<?php
    require_once "util.php";

    if(isset($_GET['delete'])){
        $id_task = $_GET['delete'];
        deleteTaskFromDatabase($id_task);      
    };

    header("Location: /TaskManagementTool/task-management/tasklist.php");
?>