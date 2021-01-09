<?php
    session_start();
    require_once "util.php";

    // if logged in then redirect to timeline.php
    if (isUserLoggedIn()) {
        header("Location: /social-network/timeline.php");
        die();
    }
    
    // get the data
    $firstName = $_POST['first_name'];
    $lastName  = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => $password,
        'posts' => []
    ];

    if (doesUserExistByEmail($email)) {
        echo "This user already exists!";
        die();
    }

    // save to file
    storeUserToFile($user);

    echo "Welcome to Cacttus Social Network. Please click <a href='/social-network/'>here</a> to login!";
?>