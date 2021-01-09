<?php
$posts = [
    "Lajmi Numer 1", "Lajmi Numer 2",
    "Lajmi Numer 3", "Lajmi Numer 4",
    "Lajmi Numer 5", "Lajmi Numer 6",
    "Lajmi Numer 7", "Lajmi Numer 8"
];

$gazetari = [
    "name" => "Filane",
    "surname" => "Fisteku"
];

function oneUpOneLower($text){
    $newText = "";

    for($i=0; $i< strlen($text); $i++){
        if($i%2==0){
            $newText .= strtoupper($text[$i]);
        }else{
            $newText .= strtolower($text[$i]);
        }
    }

    return $newText;
}

?>
<ul>
    <?php
    for ($i = 0; $i < count($posts); $i++) {
    ?>
        <li><?php echo oneUpOneLower($posts[$i]); ?></li>
    <?php
    }
    ?>
</ul>

<b>Gazetari:</b><br>
<label>Emri:</label><span><?php echo oneUpOneLower($gazetari["name"]) ?></span><br>
<label>Mbemri:</label><span><?php echo oneUpOneLower($gazetari["surname"]) ?></span><br>