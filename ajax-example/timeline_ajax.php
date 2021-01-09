<?php
session_start();
define("LOGIN_SESSION_KEY", "logged_in");
header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'Unauthorized',
    'data'    => []
];

if (
    isset($_SESSION[LOGIN_SESSION_KEY]) &&
    $_SESSION[LOGIN_SESSION_KEY] != true
) {
    echo json_encode($response);
    die();
}

$response['success'] = true;
$response['message'] = "";
$response['data'] = [
    "1. Test", "2. Test nr. 2", "3. The value", "4. Again test", "5. The last one", "6. Six"
];
echo json_encode($response);
die();