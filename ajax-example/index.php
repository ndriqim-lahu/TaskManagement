<?php
    session_start();
    define("LOGIN_SESSION_KEY", "logged_in");
    if (
        isset($_SESSION[LOGIN_SESSION_KEY]) &&
        $_SESSION[LOGIN_SESSION_KEY] == true
    ) {
        //redirect
        header("Location: ajax-example/timeline.php");
        die();
    }
?>
<html>

<head>
    <title>Log In</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <center>
        <form onsubmit="return login();">
            <input type="text" required placeholder="Username" id="username" />
            <input type="password" required id="password" />
            <button id="login_button">Login</button>
        </form>
    </center>
</body>
<script>
    function login() {
        const theUsername = $("#username").val();
        const thePassword = $("#password").val();

        //disable button in UI
        $("#login_button").html("Please wait...");
        $("#login_button").attr("disabled", true);
        console.log('start');
        // ajax call
        $.ajax("/ajax-example/login.php", {
            method: "POST",
            data: {
                username: theUsername,
                password: thePassword
            },
            success: function(content, httpStatus) {
                console.log("real-done");
                if (content.success) {
                    alert(content.message);
                } else {
                    alert(content.message);
                }

                $("#login_button").html("Login");
                $("#login_button").removeAttr("disabled");
            },
            error: function(a, b) {
                console.log('error...');
            }
        });

        console.log('done2');
        return false;
    }
</script>

</html>