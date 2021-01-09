<html>

<head>
    <title>Login with Roles</title>
</head>

<body>
    <?php
    $users = [
        'admin' => [
            'username' => 'admin',
            'password' => '123456'
        ],
        'user' => [
            'username' => 'user1',
            'password' => 'password1'
        ]
    ];

    $message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $systemUsername = $users[$role]['username'];
        $systemPassword = $users[$role]['password'];

        if ($systemUsername == $username && $systemPassword == $password) {
            echo "Welcome!";
            die();
        } else {
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

            <label>Role:</label>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <br>

            <b style="color: red;"><?php echo $message; ?></b><br>
            <button>Login</button>
        </form>
    </center>
</body>

</html>