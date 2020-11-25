<?php
    var_dump($_COOKIE);
    setcookie("test", "this is a test", time() + 60, '/');
?>