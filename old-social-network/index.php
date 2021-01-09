<?php
    session_start();
    require_once "util.php";
    
    // if logged in then redirect to timeline.php
    if(isUserLoggedIn()){
        header("Location: /social-network/timeline.php");
        die();
    }
?>
<html>

<head>
    <title>Cacttus Social Network</title>
</head>

<body>
    <center>
        <img width="400" src="https://cacttus.education/wp-content/uploads/2019/07/fb_CACTTUS_logo.png"> </img>
        <form method="POST" action="/social-network/login_logic.php">
            <label>E-mail:</label><br>
            <input type="email" name="email" /><br>
            <label>Password:</label><br>
            <input type="password" name="password" /><br><br>
            <input type="submit" value="Log In" />
        </form>
        <br>
        <a href="/social-network/register.php">Create new account!</a>
    </center>
</body>

</html>