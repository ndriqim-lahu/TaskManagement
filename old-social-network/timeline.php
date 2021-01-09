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
</head>

<body>
    <center>
        Welcome <b><?php echo $_SESSION['first_name'] ?></b>
        <a href="/social-network/signout.php">Sign out!</a>
        The content
    </center>
</body>

</html>