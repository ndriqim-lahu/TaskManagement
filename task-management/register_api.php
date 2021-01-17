<?php
    session_start();
    require_once "util.php";

    // get the data
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = [
        'full_name' => $fullName,
        'email' => $email,
        'password' => $password,
        'tasks' => []
    ];

    if (doesUserExistByEmail($email)) {
        echo "This user already exists!";
        die();
    }

    // save user to database
    storeUserToDatabase($user);

    echo "Welcome to Task Management Tool. Please click <a href='/cacttus-s3-basic-web/task-management/login.php'>here</a> to login!";
?>