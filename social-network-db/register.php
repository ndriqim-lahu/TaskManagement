<?php
    session_start();
    require_once "util.php";

    // if logged in then redirect to timeline.php
    if (isUserLoggedIn()) {
        header("Location: /social-network-db/timeline.php");
        die();
    }
?>
<html>
<head>
    <title>Cacttus Social Network | Register</title>
</head>
<body>
    <center>
        <img width="400" src="https://cacttus.education/wp-content/uploads/2019/07/fb_CACTTUS_logo.png"> </img>
        <form method="POST" action="/social-network-db/register_logic.php">
            <label>First Name:</label><br>
            <input type="text" name="first_name" /><br>
            <label>Last Name:</label><br>
            <input type="text" name="last_name" /><br>
            <label>E-mail:</label><br>
            <input type="email" name="email" /><br>
            <label>Password:</label><br>
            <input type="password" name="password" /><br><br>
            <input type="submit" value="Register" />
        </form>
        <br>
        <a href="/social-network-db/">Login if you already have an account!</a>
    </center>
</body>
</html>