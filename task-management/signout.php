<?php
    require_once "util.php";

    signOut();
    header("Location: /task-management/login.php");
    die();
?>