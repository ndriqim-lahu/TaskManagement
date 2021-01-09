<?php
session_start();
require_once "util.php";

$title = $_POST['title'];
$description = trim($_POST['description']);
$dateTimeCreated = date("F j, Y, g:i a"); 

$userId = $_SESSION['user_id'];

$post = [
    'title' => $title,
    'description' => $description,
    'createdDate' => $dateTimeCreated
];

if(!empty($title) && !empty($description)){
    storePostToFile($post, $userId);
}

if (isUserLoggedIn()) {
    header("Location: /social-network-db/timeline.php");
    die();
}


?>