<?php
    $emri = "filan";
    $mbiemri = "fisteku";
    $mosha = 24;

    $fjalia = $emri . " " . $mbiemri . " " . "eshte " . $mosha . " vjec.";
    echo $fjalia;
    echo "<br><br>";

    $a = 10;
    $b = 20;

    echo "a=".$a." b=".$b."<br>";
    echo "a+b=".($a+$b)."<br>";
    echo "a-b=" . ($a - $b) . "<br>";
    echo "a*b=" . ($a * $b) . "<br>";
    echo "a/b=" . ($a / $b) . "<br>";
?>
<br><br><br>
<?php
    echo "Fjalie me shkronja te medha: <br>";
    $fjaliaUpper = strtoupper($fjalia);
    echo $fjaliaUpper;
    echo "<br>";
    echo str_replace(" ", "-", $fjaliaUpper);
?>