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
        'createdDate' => $dateTimeCreated,
        'user_email' => $email,
    ];

    if (!empty($title) && !empty($description)) {
        storePostToFile($post);
    }

    if (isUserLoggedIn()) {
        header("Location: /social-network/timeline.php");
        die();
    }
?>