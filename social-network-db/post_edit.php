<?php
session_start();
require_once "util.php";

if (!isUserLoggedIn()) {
    header("Location: /social-network-db/");
    die();
}

$postId = $_GET['post_id'];
$post = getPostByIdAndUserId($postId, $_SESSION['user_id']);

if ($post == null) {
    echo "This post can not be edited!";
    die();
}

?>
<html>

<head>
    <title>Cacttus Social Network | Timeline</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <form class="col-6" method="POST" action="/social-network-db/post_edit_logic.php">
        <h2>Edit Post: <?php echo $postId; ?></h2><br>
        <label>Title:</label><br>
        <input name="post_id" value="<?php echo $postId ?>" type="hidden" />
        <input type="text" class="form-control" value="<?php echo $post['title']; ?>" placeholder="The title" name="title" /><br>
        <label>Description:</label><br>
        <textarea class="form-control" rows="5" cols="40" name="description"><?php echo $post['description']; ?></textarea>
        <br><br>
        <input id="submitBtn" type="submit" class="btn btn-success" value="Save" />
    </form>
</body>

</html>