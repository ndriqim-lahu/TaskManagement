<?php
$x = 25;
$y = 75;

function addition(){
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

addition();
// echo $z;

echo "<pre>";
//var_dump($_SERVER);

var_dump($_SERVER['REQUEST_METHOD']);
echo "ALL<br>";
var_dump($_REQUEST);
echo "GET<br>";
var_dump($_GET);
echo "POST<br>";
var_dump($_POST);
?>