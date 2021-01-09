<?php
session_start();
require_once "util.php";

if (!isUserLoggedIn()) {
    header("Location: /social-network-db/");
    die();
}

$postId = $_POST['post_id'];
$title = $_POST['title'];
$description = $_POST['description'];

updatePost($postId, $_SESSION['user_id'], $title, $description);
header("Location: /social-network-db/post_edit.php?post_id=".$postId);
?>