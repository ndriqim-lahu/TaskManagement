<?php
    session_set_cookie_params(0);
    session_start();
    require_once "./util.php";

    header('Content-Type: application/json');

    // check if request method isn't POST
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo json_encode([
            'success' => false,
            'message' => 'POST HTTP Method required!'
        ]);
        die();
    }

    // check user if logged-in and authenticated
    if (isUserLoggedIn()) {
        echo json_encode([
            'success' => false,
            'message' => 'User is already authenticated'
        ]);
        die();
    }

    // get the data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = findUserByEmailAndPassword($email, $password);

    // check user if can log-in (authenticated) or cannot (wrong crendentials)
    if ($user != null) {
        $_SESSION['logged_in'] = true;
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $user['id'];
        echo json_encode([
            'success' => true,
            'message' => 'Authenticated'
        ]);
        die();
    } else {
        $_SESSION['logged_in'] = false;
        echo json_encode([
            'success' => false,
            'message' => 'Wrong crendentials!'
        ]);
        die();
    }
?>