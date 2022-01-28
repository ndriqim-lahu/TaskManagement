<?php
  require_once "./util.php";

  signOut();
  header("Location: ./login.php");

  die();
?>