<?php
    require_once 'db.php';

    function isUserLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
?>