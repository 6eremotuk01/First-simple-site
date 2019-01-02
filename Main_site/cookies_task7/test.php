<?php
    $num = 7;

    if (isset($_POST['main']))
        header("Location: ../index.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link rel="stylesheet" href="../hello.css">
</head>
<body>
    <div class="all-content">
        <?php include("../templates/header_t.php"); ?>
        <div class="content">
            <h1>Результаты игры</h1>
            <?php
                $ug = 0;
                $numbers = explode(',', $_COOKIE['numbers']);

                if(sizeof($numbers) == 6)
                {
                    foreach($numbers as $number)
                    {
                        if ((integer)$number > 36 || (integer)$number < 1)
                        {
                            echo "<p class='error'>Число $number не соотвуют правилам ( 1 >= n <= 36)</p>";
                            $no_play = true;
                        }
                    }

                    for($i = 0; $i < sizeof($numbers); $i++)
                    {
                        for ($j = 0; $j < sizeof($numbers); $j++)
                        {
                            if ($j != $i && (int)$numbers[$i] == (int)$numbers[$j])
                            {
                                echo "<p class='error'>Число $number повторяется!</p>";
                                $no_play = true;
                            }
                        }
                    }

                    if (!$no_play)
                    {
                        $random = array(
                            rand(1, 5),
                            rand(6, 11),
                            rand(12, 17),
                            rand(18, 23),
                            rand(24, 29),
                            rand(30, 36)
                        );

                        echo "Ваши числа: ".$numbers[0];
                        for ($i = 1; $i < sizeof($numbers); $i++)
                            echo ", ".(int)$numbers[$i];

                        echo "<br><br>Волшебный мешочек выдал: <br>";
                        for ($i = 0; $i < sizeof($numbers); $i++)
                        {
                            echo "Число ".$random[$i];
                            for ($j = 0; $j < sizeof($random); $j++)
                                if ($numbers[$j] == $random[$i])
                                {
                                    $ug++;
                                    echo "- Вы угадали!";
                                }
                            echo "<br>";
                        }
                        echo "<br><b>Вы угадали $ug</b>";
                    }
                }
                else
                    echo "<p class='error'>Количество чисел не соответствует правилам</p>";
            ?>
            <br>
            <a href="index.php">Назад</a>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
