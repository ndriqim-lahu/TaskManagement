<?php
    // define connection variables
    $host   = "localhost"; // 127.0.0.1
    $user       = "root";
    $password   = "";
    $dbName     = "task-management";

    // create connection
    $dbConnection = null;
    try {
        $dbConnection = new PDO(
            'mysql:host=' . $host . ';dbname=' . $dbName,
            $user,
            $password
        );
    } catch (Exception $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    if (!$dbConnection) {
        echo "No database connection!";
        die();
    }
?>