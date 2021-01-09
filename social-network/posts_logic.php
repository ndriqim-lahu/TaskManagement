<?php
session_start();
require_once "util.php";

$title = $_POST['title'];
$description = trim($_POST['description']);
$dateTimeCreated = date("F j, Y, g:i a"); 

$email = $_SESSION['email'];

$post = [
    'title' => $title,
    'description' => $description,
    'createdDate' => $dateTimeCreated
];

if(!empty($title) && !empty($description)){
    storePostToFile($post, $email);
}

if (isUserLoggedIn()) {
    header("Location: /social-network/timeline.php");
    die();
}


?>