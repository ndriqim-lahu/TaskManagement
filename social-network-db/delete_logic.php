<?php
session_start();
require_once "util.php";

if (!isUserLoggedIn()) {
    header("Location: /social-network-db/");
    die();
}

$postId = $_GET['post_id'];
deletePostByIdAndUserId($postId, $_SESSION['user_id']);
header("Location: /social-network-db/timeline.php");
?>