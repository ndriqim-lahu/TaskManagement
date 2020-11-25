<?php
    $database = [
        "Test nga provimi", 
        "Matematika eshte lende e mire",
        "Tung juve",
        "Progtamim ne web",
        "Gjirafa eshte e gjate",
        "software development",
        "Problem me gjet parking",
        "code editor per PHP"
    ];
?>
<html>
<head>
    <title>Search Engine</title>
</head>
<body>
    <?php 
        $q = empty($_GET['q'])?null: $_GET['q'];
    ?>
    <center>
        <img width="200" src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" />
        <br>
        <form action="">
            <input name="q" style="width: 600px; height: 30px;" type="text">
        </form>

        <?php
            $flag = $q;
            $searched_words = [];
            $j = 0;
            foreach ($database as $i) {
                $test = stripos($i, $flag);
                if ($test != false) {
                    $searched_words[$j] = $i;
                    $j++;
                } else {

                }
            }
        ?>

        <?php
        if ($q != null) {
            if (!empty($searched_words)) { ?>
                <div>
                    <b>Ju keni kerkuar: <?php echo $q ?></b><br>
                    <b>Jane gjetur N rezultate.</b>

                    <?php
                    for ($item = 0; $item < count($searched_words); $item++) {
                        if (!empty($searched_words)) { ?>
                            <ul>
                                <li><?php echo $searched_words[$item]; ?></li>
                            </ul>
                    <?php
                        }
                    } ?>
            </div>
        <?php
            }
        }
        ?>
    </center>
</body>
</html>