<?php
    require_once "util.php";
	
    signOut();
    header('Content-Type: application/json');

    // check if request method isn't POST and then destroy the user session
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo json_encode([
            'success' => false,
            'message' => 'POST HTTP Method required!'
        ]);
        die();
    }
    echo json_encode([
        'success' => true,
        'message' => 'User session is destroyed!'
    ]);
    die();
?>