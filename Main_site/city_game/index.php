<?php
    session_start();
    header("Content-type: text/html; charset=UTF8");

    $num = "Игра в города";

    if (isset($_POST['main']))
        header("Location: ../index.php");

    if (isset($_POST['restart']))
    {
        $link = mysqli_connect('localhost', 'root', '', 'cities')
            or die("Ошибка " . mysqli_error($link));
        mysqli_set_charset($link, "utf8");

        $query = "UPDATE all_cities SET can_use = 0 WHERE 1";
        $result = mysqli_query($link, $query)
            or die("Ошибка " . mysqli_error($link));

        $_SESSION['answer'] = '';

        $link->close();
    }

    if (isset($_POST['set_sity']))
    {
        if ((substr(mb_strtolower($_SESSION['answer'], 'utf-8'), -2) == substr(mb_strtolower($_POST['city'], 'utf-8'), 0, 2))
            || $_SESSION['answer'] == '' && $_POST['city'] != '')
        {
            $error = false;

            $link = mysqli_connect('localhost', 'root', '', 'cities')
                or die("Ошибка " . mysqli_error($link));
            mysqli_set_charset($link, "utf8");

            $symb = substr(mb_strtolower($_POST['city'], 'utf-8'), -2);
            $query = "SELECT * FROM all_cities WHERE city LIKE '$symb%'";
            $result = mysqli_query($link, $query)
                or die("Ошибка " . mysqli_error($link));

            $cities = array();
            while ($row =  mysqli_fetch_row($result))
            {
                if ($row[1] == 0)
                    $cities[] = $row[0];
            }

            if (sizeof($cities) == 0)
                $win = true;

            if (!$win)
            {
                $_SESSION['answer'] = $cities[rand(0, sizeof($cities) - 1)];
                $city =  $_SESSION['answer'];
                $query = "UPDATE all_cities SET can_use = 1 WHERE city = \"$city\"";
                $result = mysqli_query($link, $query)
                    or die("Ошибка " . mysqli_error($link));
            }
            else
            {
                $query = "UPDATE all_cities SET can_use = 0 WHERE 1";
                $result = mysqli_query($link, $query)
                    or die("Ошибка " . mysqli_error($link));
            }

            $link->close();
        }
        else
            $error = true;
    }
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
        <?php include("../templates/header.php"); ?>
        <div class="content">
            <h1>Игра в города</h1>
            <h3>Правила игры</h3>
            <p>Для начала игры необходимо нажать кнопку "Начать игру сначала!". Ваш ход первый - вы должны ввести город для робота. Далее робот ответит вам городом, указывая последнюю букву. На эту букву и должен начинатся Ваш город. Вы сможете выйграть, если у робота не останется слов. Удачи!</p>
            <br>
            <form method="post">
                <?php
                    if ($error)
                        echo "<p class='error'>Робот: Введен город не на ту букву!</p>";
                    if ($win)
                        echo "<p class='error' style='color: green;'>Вы выйграли!</p>";

                    if (!$win)
                    {
                        if ($_SESSION['answer'] != '')
                            echo "Робот: ".$_SESSION['answer'].", вам на ".substr($_SESSION['answer'], -2)."<br>";
                        else
                            echo "Робот: Ваш ход первый!<br>";
                        echo "<label>Введите город </label>";
                        echo "<input type='text' name='city'> <input type='submit' value='Отправить' name='set_sity'>";
                    }
                ?>

                <br>
                <input type="submit" value="Начать игру сначала!" name="restart">
            </form>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
