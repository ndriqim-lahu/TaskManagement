<?php
session_start();
// var_dump($_SESSION);
?>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
            echo "Welcome!";
            ?>
            <form method="POST" action="logout.php">
                <button>Log Out</button>
            </form>
            <?php
            die();
        }
    ?>


    <?php
    $adminUsername = "root";
    $adminPassword = "123456";

    $message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($adminUsername == $username && $adminPassword == $password) {
            $_SESSION['logged_in'] = true;
            echo "Welcome!";
            die();
        } else {
            $_SESSION['logged_in'] = false;
            // username or password is wrong
            $message = "Username or password is wrong.";
        }
    }
    ?>

    <center>
        <img width="200" src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" />
        <br>
        <form method="POST" action="">
            <label>Username or E-Mail:</label>
            <input type="text" name="username" />

            <br>

            <label>Password:</label>
            <input type="password" name="password" />

            <br>
            <b style="color: red;"><?php echo $message; ?></b><br>
            <button>Login</button>
        </form>
    </center>
</body>

</html>