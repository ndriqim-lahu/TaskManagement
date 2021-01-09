<?php
    session_start();
    define("LOGIN_SESSION_KEY", "logged_in");

    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        echo "error1";
        die();
    }

    header('Content-Type: application/json');
    $response = [
        'success' => false,
        'message' => 'The username and password doesn\'t match'
    ];

    if(isset($_SESSION[LOGIN_SESSION_KEY]) && 
            $_SESSION[LOGIN_SESSION_KEY] == true ){
        $response['message'] = 'User is already logged in!';
        echo json_encode($response);
        die();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $adminUsername = "admin";
    $adminPassword = "admin";

    if($username == $adminUsername && $password == $adminPassword){
        $response['success'] = true;
        $response['message'] = 'Welcome...';
        $_SESSION[LOGIN_SESSION_KEY] = true;
        echo json_encode($response);
    }else {
        unset($_SESSION[LOGIN_SESSION_KEY]);
        echo json_encode($response);
    }
?>