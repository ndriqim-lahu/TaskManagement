<?php
session_start();
require_once "util.php";
// if not logged in then redirect to login.php
if (!isUserLoggedIn()) {
    header("Location: /social-network/");
    die();
}

?>
<html>

<head>
    <title>Cacttus Social Network  |   Timeline</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <center>
        Welcome <b><?php echo $_SESSION['first_name'] ?></b>
        <a href="/social-network/signout.php">Sign out!</a>
        <br>
        <form class="col-6"  method="POST" action="/social-network/posts_logic.php">
            <h2>New Post:</h2><br>
            <label>Title:</label><br>
            <input type="text" class="form-control" name="title" /><br>
            <label>Description:</label><br>
            <textarea class="form-control" rows = "5" cols = "40" name = "description">
                
            </textarea>
            <br><br>
            <input id="submitBtn"type="submit" class="btn btn-success" value="Save" />
        </form>

        <div class="card">
            <div class="card-header">
                Recent Posts | From newest to oldest created
            </div>
            <div class="card-body">
                <div class="savedPosts" name="savedPosts">
                    <?php 

                        $email = $_SESSION['email'];

                        $posts = getUserPosts($email);

                        if (empty($posts)) {
                    ?>
                    <div class="alert alert-primary" role="alert">
                        Nuk ka postime te ketij shfrytezuesi.
                    </div>
                    
                    <?php

                    } else {
                        foreach($posts as $post) {
                            ?>
                                <h5 class="card-title">Title: <?php echo $post['title']; ?> </h5>
                                <p class="card-text">Desc: <?php echo $post['description']; ?> </p>
                                <p>Date created: <?php echo $post['createdDate'] ?> </p>
                                <hr>
                            <?php
                        }
                    }

                            ?>
                </div>
            </div>
        </div>
    </center>
</body>

</html>