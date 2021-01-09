<?php
    session_start();

    if(isset($_SESSION['visited'])){
        echo "Welcome again! This is the ".$_SESSION['visited']." time you're coming!";
        $_SESSION['visited'] += 1;
    }else{
        echo "Welcome!";
        $_SESSION['visited'] =0;
        $_SESSION['visited'] += 1;
    }
?>
