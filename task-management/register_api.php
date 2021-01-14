<?php
    session_start();
    require_once "util.php";

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo json_encode([
            'success' => false,
            'message' => 'POST HTTP Method required!'
        ]);
        die();
    }

    // if logged in then redirect to tasklist.php
    if (isUserLoggedIn()) {
        echo json_encode([
            'success' => false,
            'message' => 'User is already authenticated'
        ]);
        die();
    }
    
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

    echo "Welcome to Task Management Tool. Please click <a href='/task-management/login.php'>here</a> to login!";
?>